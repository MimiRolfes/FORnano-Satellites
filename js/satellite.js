// Nav toggle
const toggle = document.getElementById('nav-toggle');
const dropdown = document.getElementById('nav-dropdown');
const backdrop = document.getElementById('nav-backdrop');

toggle.addEventListener('click', () => {
  toggle.classList.toggle('open');
  dropdown.classList.toggle('open');
  backdrop.classList.toggle('open');
});

dropdown.querySelectorAll('a').forEach(link => {
  link.addEventListener('click', () => {
    toggle.classList.remove('open');
    dropdown.classList.remove('open');
    backdrop.classList.remove('open');
  });
});

backdrop.addEventListener('click', () => {
  toggle.classList.remove('open');
  dropdown.classList.remove('open');
  backdrop.classList.remove('open');
});

// ── Nova WebGL Orb ────────────────────────────────────────────
(function initOrb() {
  const container = document.getElementById('hero-orb');
  if (!container) return;

  const HUE = 84;            // shift purple→lime/green
  const HOVER_INTENSITY = 0.3;
  const ROTATE_ON_HOVER = true;

  const vert = `
    precision highp float;
    attribute vec2 position;
    attribute vec2 uv;
    varying vec2 vUv;
    void main() {
      vUv = uv;
      gl_Position = vec4(position, 0.0, 1.0);
    }
  `;

  const frag = `
    precision highp float;
    uniform float iTime;
    uniform vec3 iResolution;
    uniform float hue;
    uniform float hover;
    uniform float rot;
    uniform float hoverIntensity;
    varying vec2 vUv;

    vec3 rgb2yiq(vec3 c) {
      float y = dot(c, vec3(0.299, 0.587, 0.114));
      float i = dot(c, vec3(0.596, -0.274, -0.322));
      float q = dot(c, vec3(0.211, -0.523, 0.312));
      return vec3(y, i, q);
    }
    vec3 yiq2rgb(vec3 c) {
      float r = c.x + 0.956*c.y + 0.621*c.z;
      float g = c.x - 0.272*c.y - 0.647*c.z;
      float b = c.x - 1.106*c.y + 1.703*c.z;
      return vec3(r, g, b);
    }
    vec3 adjustHue(vec3 color, float hueDeg) {
      float hueRad = hueDeg * 3.14159265 / 180.0;
      vec3 yiq = rgb2yiq(color);
      float cosA = cos(hueRad);
      float sinA = sin(hueRad);
      float i = yiq.y*cosA - yiq.z*sinA;
      float q = yiq.y*sinA + yiq.z*cosA;
      yiq.y = i; yiq.z = q;
      return yiq2rgb(yiq);
    }
    vec3 hash33(vec3 p3) {
      p3 = fract(p3 * vec3(0.1031, 0.11369, 0.13787));
      p3 += dot(p3, p3.yxz + 19.19);
      return -1.0 + 2.0 * fract(vec3(p3.x+p3.y, p3.x+p3.z, p3.y+p3.z)*p3.zyx);
    }
    float snoise3(vec3 p) {
      const float K1 = 0.333333333;
      const float K2 = 0.166666667;
      vec3 i = floor(p + (p.x+p.y+p.z)*K1);
      vec3 d0 = p - (i - (i.x+i.y+i.z)*K2);
      vec3 e = step(vec3(0.0), d0 - d0.yzx);
      vec3 i1 = e*(1.0 - e.zxy);
      vec3 i2 = 1.0 - e.zxy*(1.0 - e);
      vec3 d1 = d0 - (i1 - K2);
      vec3 d2 = d0 - (i2 - K1);
      vec3 d3 = d0 - 0.5;
      vec4 h = max(0.6 - vec4(dot(d0,d0),dot(d1,d1),dot(d2,d2),dot(d3,d3)), 0.0);
      vec4 n = h*h*h*h * vec4(
        dot(d0, hash33(i)),
        dot(d1, hash33(i+i1)),
        dot(d2, hash33(i+i2)),
        dot(d3, hash33(i+1.0))
      );
      return dot(vec4(31.316), n);
    }
    vec4 extractAlpha(vec3 colorIn) {
      float a = max(max(colorIn.r, colorIn.g), colorIn.b);
      return vec4(colorIn.rgb / (a + 1e-5), a);
    }
    const float innerRadius = 0.6;
    const float noiseScale = 0.65;
    float light1(float intensity, float attenuation, float dist) {
      return intensity / (1.0 + dist * attenuation);
    }
    float light2(float intensity, float attenuation, float dist) {
      return intensity / (1.0 + dist*dist*attenuation);
    }
    vec4 draw(vec2 uv) {
      vec3 color1 = adjustHue(vec3(0.541, 0.169, 0.886), hue);
      vec3 color2 = adjustHue(vec3(0.255, 0.412, 0.882), hue);
      vec3 color3 = adjustHue(vec3(0.098, 0.098, 0.439), hue);
      float ang = atan(uv.y, uv.x);
      float len = length(uv);
      float invLen = len > 0.0 ? 1.0/len : 0.0;
      float n0 = snoise3(vec3(uv*noiseScale, iTime*0.5))*0.5+0.5;
      float r0 = mix(mix(innerRadius,1.0,0.4), mix(innerRadius,1.0,0.6), n0);
      float d0 = distance(uv, (r0*invLen)*uv);
      float v0 = light1(1.0, 10.0, d0);
      v0 *= smoothstep(r0*1.05, r0, len);
      float cl = cos(ang + iTime*2.0)*0.5+0.5;
      float a = iTime * -1.0;
      vec2 pos = vec2(cos(a), sin(a))*r0;
      float d = distance(uv, pos);
      float v1 = light2(1.5, 5.0, d);
      v1 *= light1(1.0, 50.0, d0);
      float v2 = smoothstep(1.0, mix(innerRadius,1.0,n0*0.5), len);
      float v3 = smoothstep(innerRadius, mix(innerRadius,1.0,0.5), len);
      vec3 col = mix(color1, color2, cl);
      col = mix(color3, col, v0);
      col = (col + v1)*v2*v3;
      col = clamp(col, 0.0, 1.0);
      return extractAlpha(col);
    }
    vec4 mainImage(vec2 fragCoord) {
      vec2 center = iResolution.xy*0.5;
      float size = min(iResolution.x, iResolution.y);
      vec2 uv = (fragCoord - center)/size*2.0;
      float s = sin(rot); float c = cos(rot);
      uv = vec2(c*uv.x - s*uv.y, s*uv.x + c*uv.y);
      uv.x += hover*hoverIntensity*0.1*sin(uv.y*10.0+iTime);
      uv.y += hover*hoverIntensity*0.1*sin(uv.x*10.0+iTime);
      return draw(uv);
    }
    void main() {
      vec2 fragCoord = vUv * iResolution.xy;
      vec4 col = mainImage(fragCoord);
      gl_FragColor = vec4(col.rgb * col.a, col.a);
    }
  `;

  function createShader(gl, type, source) {
    const shader = gl.createShader(type);
    gl.shaderSource(shader, source);
    gl.compileShader(shader);
    if (!gl.getShaderParameter(shader, gl.COMPILE_STATUS)) {
      console.error('Shader error:', gl.getShaderInfoLog(shader));
      gl.deleteShader(shader);
      return null;
    }
    return shader;
  }

  function createProgram(gl, vs, fs) {
    const program = gl.createProgram();
    gl.attachShader(program, vs);
    gl.attachShader(program, fs);
    gl.linkProgram(program);
    if (!gl.getProgramParameter(program, gl.LINK_STATUS)) {
      console.error('Program error:', gl.getProgramInfoLog(program));
      return null;
    }
    return program;
  }

  const canvas = document.createElement('canvas');
  const gl = canvas.getContext('webgl', { alpha: true, premultipliedAlpha: false });
  if (!gl) return;

  gl.clearColor(0, 0, 0, 0);
  container.appendChild(canvas);

  const vs = createShader(gl, gl.VERTEX_SHADER, vert);
  const fs = createShader(gl, gl.FRAGMENT_SHADER, frag);
  const program = createProgram(gl, vs, fs);
  if (!program) return;

  const positions = new Float32Array([-1,-1, 3,-1, -1,3]);
  const uvs       = new Float32Array([0,0,   2,0,  0,2]);

  const posBuf = gl.createBuffer();
  gl.bindBuffer(gl.ARRAY_BUFFER, posBuf);
  gl.bufferData(gl.ARRAY_BUFFER, positions, gl.STATIC_DRAW);

  const uvBuf = gl.createBuffer();
  gl.bindBuffer(gl.ARRAY_BUFFER, uvBuf);
  gl.bufferData(gl.ARRAY_BUFFER, uvs, gl.STATIC_DRAW);

  const posLoc         = gl.getAttribLocation(program, 'position');
  const uvLoc          = gl.getAttribLocation(program, 'uv');
  const iTimeLoc       = gl.getUniformLocation(program, 'iTime');
  const iResLoc        = gl.getUniformLocation(program, 'iResolution');
  const hueLoc         = gl.getUniformLocation(program, 'hue');
  const hoverLoc       = gl.getUniformLocation(program, 'hover');
  const rotLoc         = gl.getUniformLocation(program, 'rot');
  const hoverIntLoc    = gl.getUniformLocation(program, 'hoverIntensity');

  function resize() {
    const dpr = window.devicePixelRatio || 1;
    const w = container.clientWidth;
    const h = container.clientHeight;
    canvas.width  = w * dpr;
    canvas.height = h * dpr;
    canvas.style.width  = w + 'px';
    canvas.style.height = h + 'px';
    gl.viewport(0, 0, canvas.width, canvas.height);
  }
  window.addEventListener('resize', resize);
  resize();

  let targetHover = 0, currentHover = 0, currentRot = 0, lastTime = 0;

  container.addEventListener('mousemove', (e) => {
    const rect = container.getBoundingClientRect();
    const x = e.clientX - rect.left;
    const y = e.clientY - rect.top;
    const size = Math.min(rect.width, rect.height);
    const uvX = ((x - rect.width/2)  / size) * 2;
    const uvY = ((y - rect.height/2) / size) * 2;
    targetHover = Math.sqrt(uvX*uvX + uvY*uvY) < 0.8 ? 1 : 0;
  });
  container.addEventListener('mouseleave', () => { targetHover = 0; });

  function frame(t) {
    requestAnimationFrame(frame);
    const dt = (t - lastTime) * 0.001;
    lastTime = t;
    currentHover += (targetHover - currentHover) * 0.1;
    if (ROTATE_ON_HOVER && targetHover > 0.5) currentRot += dt * 0.3;

    gl.clear(gl.COLOR_BUFFER_BIT);
    gl.useProgram(program);

    gl.uniform1f(iTimeLoc,    t * 0.001);
    gl.uniform3f(iResLoc,     canvas.width, canvas.height, canvas.width / canvas.height);
    gl.uniform1f(hueLoc,      HUE);
    gl.uniform1f(hoverLoc,    currentHover);
    gl.uniform1f(rotLoc,      currentRot);
    gl.uniform1f(hoverIntLoc, HOVER_INTENSITY);

    gl.bindBuffer(gl.ARRAY_BUFFER, posBuf);
    gl.enableVertexAttribArray(posLoc);
    gl.vertexAttribPointer(posLoc, 2, gl.FLOAT, false, 0, 0);

    gl.bindBuffer(gl.ARRAY_BUFFER, uvBuf);
    gl.enableVertexAttribArray(uvLoc);
    gl.vertexAttribPointer(uvLoc, 2, gl.FLOAT, false, 0, 0);

    gl.drawArrays(gl.TRIANGLES, 0, 3);
  }
  requestAnimationFrame(frame);
})();
