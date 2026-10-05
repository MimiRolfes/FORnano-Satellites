<?php
/**
 * Deutsch: Die sechs Teilprojekte (TP1–TP6) des Forschungsverbundes — Texte
 * von fornano.pinsker.ai/work-packages/1–6 (Deutsch) mit englischer
 * Übersetzung (beide Sprachen Pflicht, siehe satellite_i18n()).
 *
 * Verwendet für (1) die Teilprojekt-Karten auf der About-Seite
 * (title, short) und (2) die einmalige Anlage der sechs Beiträge vom Typ
 * "work_package" beim Aktivieren des Themes (lead, body). Danach sind die
 * Inhalte ausschließlich im WordPress-Editor zu pflegen, diese Datei wird
 * nur noch für die Karten-Texte als Vorbelegung gelesen.
 *
 * Jeder Eintrag: array( EN, DE ).
 */
return array(
	1 => array(
		'title' => array( 'System Concept for Nanosatellites', 'Systemkonzept für Kleinst-Satelliten' ),
		'lead'  => array( 'JMU Würzburg & ZfT', 'JMU Würzburg & ZfT' ),
		'short' => array(
			'Development of a holistic system concept for the automated, configurable production of nanosatellites through modularization and standardization.',
			'Entwicklung eines ganzheitlichen Systemkonzepts zur automatisierten, konfigurierbaren Produktion von Kleinstsatelliten durch Modularisierung und Standardisierung.',
		),
		'body'  => array(
			array(
				'The overall goal of this subproject is to enable the automated, configurable production of small satellites through a novel system concept. Modern applications in Earth observation and telecommunications require a large number of satellites in orbit to achieve high coverage. The commercialization of spaceflight (NewSpace) has led to a large number of novel products from industry and start-ups in recent years.',
				'Das übergeordnete Ziel dieses Teilprojekts ist die Ermöglichung einer automatisierten, konfigurierbaren Produktion von Kleinsatelliten durch ein neuartiges Systemkonzept. Moderne Anwendungen aus dem Bereich der Erdbeobachtung und Telekommunikation erfordern eine große Anzahl von Satelliten im Orbit, um eine hohe Abdeckung zu erreichen. Die Kommerzialisierung der Raumfahrt (NewSpace) führte in den letzten Jahren zu einer großen Anzahl von neuartigen Produkten aus der Industrie und von Startup-Unternehmen.',
			),
			array(
				'Within this subproject, the approaches of modularization and standardization are pursued above all. This makes it possible for users to configure a satellite bus with the web configurator in subproject 6 and then have the satellites integrated in an automated production process. A modular satellite design, however, also requires a suitable system concept, since there are many dependencies between the subsystems of a satellite.',
				'Im Rahmen dieses Teilprojekts werden vor allem die Ansätze Modularisierung und Standardisierung verfolgt. Somit ist es möglich, durch den Webkonfigurator in Teilprojekt 6 einen Satellitenbus durch den Anwender zu konfigurieren und dann in einem automatisierten Produktionsvorgang die Satelliten zu integrieren. Ein modularer Satellitenaufbau erfordert allerdings auch ein geeignetes Systemkonzept, da viele Abhängigkeiten zwischen den Subsystemen in einem Satellit vorliegen.',
			),
			array(
				'Modularization must be extended across various subsystems so that the satellite bus can be configured according to the end user\'s requirements. Individual systems are to be assembled on a building-block principle that takes manufacturing aspects into account (Design for Manufacturing), and produced and tested automatically. The standardization of hardware interfaces and connectors is of crucial importance, as they enable the physical connection and communication between satellite components.',
				'Die Modularisierung muss im Bereich verschiedener Subsysteme erweitert werden, um den Satellitenbus nach Vorstellung des Endanwenders konfigurieren zu können. So sollen einzelne Systeme nach einem Baukastenprinzip, welches Fertigungsaspekte berücksichtigt (Design for Manufacturing), zusammengestellt und automatisch produziert und getestet werden können. Die Standardisierung von Hardware-Schnittstellen und Steckverbindern ist von entscheidender Bedeutung, da sie die physische Verbindung und Kommunikation zwischen Satellitenkomponenten ermöglichen.',
			),
			array(
				'Software standardization for small satellites is to use the development of software frameworks and platforms so that satellite developers can build on existing solutions. Developing a new UNISEC version promises improvements on several levels, including electrical interfaces, materials and components, as well as automation and robotics.',
				'Die Software-Standardisierung bei Kleinsatelliten soll die Entwicklung von Software-Frameworks und -Plattformen nutzen, um es Satellitenentwicklern zu ermöglichen, auf vorhandenen Lösungen aufzubauen. Die Erarbeitung einer neuen UNISEC Version verspricht Verbesserungen auf mehreren Ebenen, darunter elektrische Schnittstellen, Materialien und Komponenten, sowie Automatisierung und Robotik.',
			),
			array(
				'The subproject also develops innovative subsystems in antenna technology and solar cells in the form of a modular design. Printed solar cells are to be integrated into the satellite bus as needed. A further focus is the development of automated and parallelized tests of radio subsystems in order to increase the reliability of the assemblies and reduce test times, as well as the integration of the test environment into the digital production environment.',
				'Das Teilprojekt entwickelt zudem innovative Subsysteme aus dem Bereich Antennentechnik und Solarzellen in Form eines modularen Aufbaus. Gedruckte Solarzellen sollen nach Bedarf in den Satellitenbus integriert werden können. Ein weiterer Schwerpunkt liegt auf der Entwicklung automatisierter und parallelisierter Tests von Radio Subsystemen, um die Zuverlässigkeit der Baugruppen zu erhöhen und Testzeiten zu reduzieren, sowie die Einbindung der Testumgebung in die digitale Produktionsumgebung.',
			),
		),
	),
	2 => array(
		'title' => array( 'Computer Architecture for On-Board Computers (OBC)', 'Rechnerarchitektur für On-Board-Computer (OBC)' ),
		'lead'  => array( 'FAU Computer Architecture', 'FAU Rechnerarchitektur' ),
		'short' => array(
			'Establishment and testing of a new architecture concept for the on-board computer based on the open RISC-V instruction set architecture and FPGA hardware.',
			'Etablierung und Erprobung eines neuen Architekturkonzeptes für den On-Board-Computer auf Basis der offenen RISC-V Befehlssatzarchitektur und FPGA-Hardware.',
		),
		'body'  => array(
			array(
				'The general goal of subproject 2 is to establish and test a new architecture concept for the on-board computer (OBC) of nanosatellites, based on the open RISC-V instruction set architecture and using FPGA hardware as the processor implementation platform with soft IPs. The project promises not only a guide for the computer architecture of OBCs in future nanosatellites, but also a decisive influence on the future architecture design of the nanosatellites built at the University of Würzburg and the Zentrum für Telematik.',
				'Ziel des Teilprojektes 2 ist allgemein die Etablierung und die Erprobung eines neuen Architekturkonzeptes für den On-board-Computer (OBC) von Kleinstsatelliten auf der Basis der offenen Befehlssatz-Architektur RISC-V und der Nutzung von FPGA-Hardware als Prozessor-Implementierungsplattform mit Soft-IPs. Das Projekt verspricht nicht nur einen Wegweiser für die Rechnerarchitektur in OBCs zukünftiger Kleinstsatelliten, sondern auch einen entscheidenden Einfluss auf die zukünftige Architekturauslegung für die an der Universität Würzburg und dem Zentrum für Telematik gebauten Kleinstsatelliten.',
			),
			array(
				'A particular focus on immunity to radiation effects in orbit lies in the design of a redundant architecture that is relevant not only for a nanosatellite but also for aircraft flying at high altitudes. The starting point for the planned investigation is the RISC-V instruction-set-compatible architecture NOEL-V, already released for space and designed by its developers specifically for space applications.',
				'Ein besonderer Schwerpunkt bei der Immunität gegenüber Strahlungseinflüssen im Orbit liegt in der Konzeption einer redundanten Architektur, die nicht nur für einen Kleinstsatelliten, sondern auch für in großen Höhen fliegenden Flugzeugen von Relevanz ist. Ausgangspunkt für die geplante Untersuchung ist die für den Weltraum bereits aufgelegte RISC-V Befehlssatz-kompatible Architektur NOEL-V, die von den Entwicklern speziell für Anwendungen im Weltraum entworfen wurde.',
			),
			array(
				'The project investigates which generic computing modules can be identified for a heterogeneous computer architecture required in a nanosatellite and in a large aircraft, from which an OBC and a payload processor with sufficiently high fault tolerance can be assembled. This is to be achieved through modular, pluggable components of an architecture that can also be integrated into a web configurator. Furthermore, the possibility of subsequently reconfiguring an FPGA as the target platform in the nanosatellite is exploited for the OBC operating in orbit.',
				'Das Projekt untersucht welche generischen Rechenmodule für eine in einem Kleinstsatelliten und in einem Großflugzeug erforderliche heterogene Rechnerarchitektur identifizierbar sind, aus denen ein OBC und ein Payload-Prozessor mit ausreichend hoher Fehlertoleranz assembliert werden können. Diese sollen über modulare, steckbare Komponenten einer Architektur erreicht werden, die auch in einem Web-Konfigurator integriert werden können. Ferner wird die Möglichkeit der nachträglichen Rekonfigurierbarkeit eines FPGAs als Zielplattform im Kleinstsatelliten für den im Orbit im Betrieb befindlichen OBC ausgenutzt.',
			),
			array(
				'The implementation comprises a complete architecture with operating system and application demonstration in an FPGA that serves as both demo and target platform. A heterogeneous, flexible architecture with a special number-cruncher processor for controlling the satellite terminal for communication is built. In addition, preprocessing in the OBC and in the payload processor is shown and tested for selected applications, and the use of additional AI accelerators is demonstrated.',
				'Die Implementierung umfasst eine komplette Architektur mit Betriebssystem und Anwendungs-Demonstration in einem FPGA, der zugleich Demo- und Zielplattform darstellt. Es erfolgt der Aufbau einer heterogenen flexiblen Architektur mit speziellem Number-Cruncher-Prozessor zur Ansteuerung des Satelliten-Terminals zur Kommunikation. Zudem wird eine Vorverarbeitung im OBC und im Payload-Prozessor für ausgewählte Anwendungen aufgezeigt und erprobt, sowie der Einsatz von zusätzlichen KI-Beschleunigern demonstriert.',
			),
			array(
				'The project contributes to the development of a RISC-V community in Bavaria and Germany by spreading RISC-V technology for aerospace. The porting of the real-time operating system RTEMS to the new architecture NOEL-V light, which is derived from the NOEL-V architecture designed primarily for large satellites, is part of the project.',
				'Das Projekt leistet einen Beitrag zur Entwicklung einer RISC-V-Community in Bayern und Deutschland durch Verbreitung der RISC-V-Technologie für die Raum- und Luftfahrt. Die Portierung des Realzeit-Betriebssystem RTEMS auf die neue Architektur NOEL-V light, die aus der vor allem für den Einsatz in Großsatelliten entworfenen Architektur NOEL-V abgeleitet wird, ist Teil des Projekts.',
			),
		),
	),
	3 => array(
		'title' => array( 'Automated Assembly System for Nanosatellites in System-in-Package Technology', 'Automatisiertes Montagesystem für Kleinstsatelliten in System-in-Package Technologie' ),
		'lead'  => array( 'FAU FAPS', 'FAU FAPS' ),
		'short' => array(
			'Concept, development and prototype implementation of the assembly and interconnection technology and automated assembly processes for producing novel nanosatellites.',
			'Konzeptionierung, Entwicklung und prototypische Umsetzung der Aufbau- und Verbindungstechnik sowie automatisierter Montageprozesse zur Herstellung neuartiger Kleinstsatelliten.',
		),
		'body'  => array(
			array(
				'The goal of subproject 3 is the concept, development and prototype implementation of the assembly and interconnection technology (AVT) and automated assembly processes for producing novel nanosatellites. In cooperation with TP1, the external influences that the system must withstand during transport into space and during its time in orbit are analyzed first, as they shape the later choice of materials and processes. The requirements include in particular accelerations and vibrations as well as extreme temperature ranges and changes, and radiation exposure.',
				'Das Ziel des Teilprojekts 3 besteht in der Konzeptionierung, Entwicklung und prototypischen Umsetzung der Aufbau- und Verbindungstechnik (AVT) sowie automatisierter Montageprozesse zur Herstellung neuartiger Kleinstsatelliten. In Kooperation mit TP1 werden hierfür zunächst die äußeren Einflüsse analysiert, denen das System während des Transports ins All und dem Aufenthalt im Orbit standhalten muss, da diese die spätere Auswahl der Materialien und Prozesse prägen. Die Anforderungen umfassen insbesondere Beschleunigungen und Vibrationen sowie extreme Temperaturbereiche bzw. -wechsel und Strahlenbelastung.',
			),
			array(
				'Given the miniaturized installation space, particular attention is paid to the development of advanced technologies for chip attachment, 3D topology and packaging. The miniaturization of satellites leads to significant extensions of the current state of the art and research. Completely new is the entire process chain for assembling miniaturized 3D microsystems in System-in-Package technology (SiP) by linking innovative individual processes.',
				'Angesichts des miniaturisierten Bauraums gilt ein besonderes Augenmerk der Entwicklung fortgeschrittener Technologien zur Chipanbindung, zur 3D-Topologie und zum Packaging. Die Miniaturisierung der Satelliten führt zu bedeutenden Erweiterungen des aktuellen Stands der Technik und Forschung. Vollständig neu ist die gesamte Verfahrenskette zur Montage miniaturisierter 3D-Mikrosysteme in System-in-Package Technologie (SiP) über die Verknüpfung innovativer Einzelprozesse.',
			),
			array(
				'The first step comprises the individual 3D printing of the spatial electronic circuit carriers and housings from selected ceramic materials. The additive manufacturing of ceramic components by Fused Filament Fabrication (FFF) is evaluated, with a particular focus on adapting the process parameters to reduce surface roughness. Thermal gradients during the printing process and during the chemical and thermal post-treatment cause thermomechanical stresses that can lead to cracks and warping in the component. Various methods for reducing warping are explored and compared.',
				'Der erste Schritt umfasst den individuellen 3D-Druck der räumlichen elektronischen Schaltungsträger und Gehäuse aus ausgewählten keramischen Werkstoffen. Die additive Fertigung von keramischen Bauteilen mittels Fused Filament Fabrication (FFF) wird evaluiert, mit besonderem Fokus auf der Anpassung der Prozessparameter zur Reduzierung der Oberflächenrauheit. Durch die thermischen Gradienten beim Druckprozess sowie im Zuge der chemischen und thermischen Nachbehandlungsprozesse treten thermomechanische Spannungen auf, welche zu Rissen und Verzug im Bauteil führen können. Verschiedene Methoden zur Verzugsreduzierung werden eruiert und miteinander verglichen.',
			),
			array(
				'The electrical functionalization of the additively manufactured ceramic components then follows by synchronous 5-axis printing of conductive, nanoparticle-based inks, for example based on silver nanospheres, nanowires or nanoplatelets. Various silver-based inks are used with different technologies in order to produce representative circuit layouts with high edge sharpness and the lowest possible overspray in a stable and reproducible way.',
				'Anschließend erfolgt die elektrische Funktionalisierung der additiv gefertigten Keramikbauteile mittels synchronem 5-Achs-Druck von leitfähigen, Nanopartikel-basierten Tinten, wie zum Beispiel auf Basis von Silber-Nano-Spheres, -Wires oder -Platelets. Verschiedene silberbasierte Tinten werden mit unterschiedlichen Technologien eingesetzt, um repräsentative Schaltungslayouts mit hoher Kantenschärfe und einem möglichst niedrigen Overspray stabil und reproduzierbar herzustellen.',
			),
			array(
				'The selective drying and sintering of the particles of the conductive inks is carried out using novel methods of energy input. Lasers, vapor phase, microwaves, induction and convection are investigated and evaluated for this purpose. The evaluation criteria are, on the one hand, the electrical conductivity determined by four-point measurement and, on the other hand, the geometric structure of the conductor tracks characterized by microscopy.',
				'Das selektive Trocknen und Sintern der Partikel der leitfähigen Tinten erfolgt mittels neuartiger Methoden zum Energieeintrag. Hierzu werden Laser, Dampfphase, Mikrowellen, Induktion und Konvektion untersucht und evaluiert. Als Bewertungskriterien werden einerseits die mittels Vierpunktmessung bestimmte elektrische Leitfähigkeit und andererseits die mittels Mikroskopie charakterisierte geometrische Struktur der Leiterbahnen herangezogen.',
			),
			array(
				'The 3D precision placement of the integrated circuits (ICs) on the electrically functionalized spatial circuit carriers is realized by automated placement systems. For the 3D integration of the required ICs in the miniaturized installation space, advanced interconnection technologies are used, in particular System-in-Package technologies such as chip stacking by means of Through Silicon Vias, flip-chip mounting, solder ball bumping and other vertical electrical interconnection techniques.',
				'Die 3D-Präzisionsbestückung der integrierten Schaltkreise (IC) auf den elektrisch funktionalisierten räumlichen Schaltungsträgern wird durch automatisierte Bestückungssysteme realisiert. Für die 3D-Integration der benötigten ICs im miniaturisierten Bauraum werden fortgeschrittene Verbindungstechnologien eingesetzt, insbesondere System-in-Package-Technologien wie Chip-Stapeltechniken mittels Through Silicon Vias, Flip-Chip-Montage, Solder Ball Bumping sowie weitere vertikale elektrische Verbindungstechniken.',
			),
			array(
				'The third work package comprises the necessary investigations to test the reliability and lifetime of the metallized and populated ceramics. The assemblies are subjected to a thermal cycling test to determine the resistance of the connections to mechanical stress. Vibration tests evaluate the mechanical stability and robustness of the assembly. High-temperature storage is used to investigate the thermal stability and long-term durability of the assembly at high operating temperatures.',
				'Das dritte Arbeitspaket umfasst notwendige Untersuchungen zur Prüfung der Zuverlässigkeit und der Lebensdauer der metallisierten und bestückten Keramiken. Die Aufbauten werden einem Temperaturwechseltest ausgesetzt, um die Beständigkeit der Verbindungen gegenüber der mechanischen Beanspruchung zu bestimmen. Vibrationstests bewerten die mechanische Stabilität und Widerstandsfähigkeit der Baugruppe. Mittels Hochtemperaturauslagerung wird die thermische Stabilität und Langzeitbeständigkeit der Baugruppe bei hohen Betriebstemperaturen untersucht.',
			),
			array(
				'Finally, a concept is developed to combine the individual processes of additive metallization in the miniaturized installation space of the nanosatellites in a single system. To this end, the capabilities of the 5-axis system are to be combined with high-precision IC placement modules. This system is intended to enable flexible and precise manufacturing, as all tools are mounted at the same time and can be activated by tool-change commands.',
				'Schließlich wird ein Konzept erarbeitet, um die einzelnen Prozesse der additiven Metallisierung im miniaturisierten Bauraum der Kleinstsatelliten in einer Anlage zu vereinen. Hierzu sollen die Fähigkeiten der 5-Achs-Anlage mit hochpräzisen IC-Bestückungsmodulen kombiniert werden. Diese Anlage soll eine flexible und präzise Fertigung ermöglichen, da alle Werkzeuge gleichzeitig montiert sind und durch Werkzeugwechselbefehle aktiviert werden können.',
			),
		),
	),
	4 => array(
		'title' => array( 'Applications of Nanosatellites', 'Anwendungen von Kleinstsatelliten' ),
		'lead'  => array( 'ZfT & JMU', 'ZfT & JMU' ),
		'short' => array(
			'Identification and development of application scenarios for the new generation of nanosatellites, with a focus on Earth observation, telecommunications and atmospheric measurements.',
			'Identifikation und Entwicklung von Anwendungsszenarien für die neue Generation von Kleinstsatelliten mit Fokus auf Erdbeobachtung, Telekommunikation und atmosphärische Messungen.',
		),
		'body'  => array(
			array(
				'The overall goal of subproject 4 within the consortium is to demonstrate the particular usefulness of the targeted new generation of nanosatellites through possible applications from the consortium. In subproject 4, analyses and assessments are carried out in the form of mission design and feasibility studies. Certain boundary conditions, such as the low altitude of a nanosatellite in low Earth orbit (LEO) or its agility, make it more attractive than a large satellite for the proposed use cases.',
				'Das übergeordnete Ziel von Teilprojekt 4 im Rahmen des Gesamtverbundes ist die Demonstration der besonderen Nützlichkeit der angestrebten neuen Generation von Kleinstsatelliten anhand von möglichen Anwendungen aus dem Konsortium. In Teilprojekt 4 werden in Form von Missionsdesign und Machbarkeitsstudien Analysen und Bewertungen durchgeführt. Aufgrund bestimmter Randbedingungen, wie beispielsweise die niedrige Ausbreitungshöhe eines Kleinstsatelliten im LEO-Bereich oder dessen Beweglichkeit, machen diesen für die eingebrachten Anwendungsfälle interessanter als einen Großsatelliten.',
			),
			array(
				'The first application focuses on pico or nanosatellites as relays for radiosondes. The data from the radiosondes is to be recorded by a satellite system and fed directly into the internet by the satellite ground station. The focus here is on the coverage of the target area by a corresponding satellite network and on the design of typical system budgets such as energy, link and data budgets. More than 100,000 weather balloon sondes are launched every year, collecting meteorological data and sending it to the ground stations of the weather services. To increase the efficiency of radiosonde data, the use of a satellite system as a relay station is investigated, which can receive the radiosonde data and feed it directly into the internet via ground stations. This allows the number of ground stations to be reduced and a larger target area to be covered.',
				'Die erste Anwendung konzentriert sich auf Pico- bzw. Kleinstsatelliten als Relais für Radiosonden. Die Daten der Radiosensoren sollen von einem Satellitensystem aufgezeichnet und direkt durch die Satellitenbodenstation ins Internet eingespeist werden. Die Abdeckung des Zielgebiets durch ein entsprechendes Satellitennetz sowie die Auslegung typischer Systembudgets wie Energie-, Link- und Datenbudget stehen hier im Fokus. Jährlich werden über 100.000 Wetterballonsonden gestartet, welche meteorologische Daten erheben und an die Bodenstationen der Wetterdienste senden. Um die Effizienz der Radiosondendaten zu steigern, wird der Einsatz eines Satellitensystems als Relaisstation untersucht, das die Daten der Radiosonden empfangen und über Bodenstationen direkt ins Internet einspeisen kann. Dadurch können die Anzahl der Bodenstationen reduziert und ein größeres Zielgebiet abgedeckt werden.',
			),
			array(
				'The second application deals with the development of a satellite system for capturing multispectral image data of bodies of water, for example for so-called biomonitoring. To guarantee continuous recordings during the satellite\'s overflight, reflections on the water surfaces caused by solar radiation must be minimized. This can be done by suitable algorithms and appropriate body pointing of the satellite. The camera is to adapt flexibly to different lighting conditions in order to capture optimal images and data. The nanosatellite can re-orient itself sideways, a capability that a large satellite cannot easily achieve. Efficient algorithms are required to process the acquired data, converting the raw data into relevant information and analyzing water quality. It is also tested whether the recorded spectral data can already be preprocessed on the satellite in the OBC or the payload processor; for example, several spectral channels can be combined to reduce the volume of data to be sent to Earth.',
				'Die zweite Anwendung befasst sich mit der Entwicklung eines Satellitensystems zur Aufnahme von multispektralen Bilddaten von Gewässern, beispielsweise für ein sogenanntes Biomonitoring. Um kontinuierliche Aufnahmen beim Überflug des Satelliten zu garantieren, müssen durch Sonneneinstrahlung verursachte Reflektionen auf den Wasseroberflächen minimiert werden. Dies kann durch geeignete Algorithmen und ein entsprechendes Body-Pointing des Satelliten vorgenommen werden. Die Kamera soll sich flexibel an unterschiedliche Lichtverhältnisse anpassen können, um optimale Bilder und Daten zu erfassen. Der Kleinstsatellit kann sich seitlich neu ausrichten, eine Eigenschaft, die ein Großsatellit nicht ohne weiteres hinbekommt. Zur Verarbeitung der gewonnenen Daten sind effiziente Algorithmen erforderlich, die die Rohdaten in relevante Informationen umwandeln und die Gewässerqualität analysieren. Ferner wird erprobt, ob bereits auf dem Satelliten eine Vorverarbeitung der aufgenommenen Spektraldaten im OBC oder im Payload-Prozessor erfolgen kann, beispielsweise können verschiedene Spektralkanäle zusammengefasst werden, um das zur Erde zu sendende Datenvolumen zu verringern.',
			),
			array(
				'The third application aims at transmitting data from a nanosatellite to the cockpit of an aircraft. Specifically, this concerns the transmission of weather data, for example the position of lightning strikes or a rain radar. The idea is to use a nanosatellite for this transmission of data to the cockpit, as it is much closer to the aircraft than a ground station. Within the mission design study, a satellite mission is designed whose space segment is suitable for the direct transmission of relevant data to the aircraft cockpit. This can improve flight safety and efficiency by giving pilots up-to-date information in real time.',
				'Die dritte Anwendung zielt auf die Übertragung von Daten von einem Kleinstsatelliten in das Cockpit eines Flugzeugs ab. Konkret geht es um die Übermittlung von Wetterdaten, beispielsweise über die Position von auftretenden Blitzen oder einen Regenradar. Die Idee ist, für diese Übertragung der Daten ins Cockpit einen Kleinstsatelliten zu nutzen, der einen wesentlich geringeren Abstand zum Flugzeug aufweist als eine Bodenstation. Im Rahmen der Missionsdesignstudie wird eine Satellitenmission ausgelegt, deren Raumsegment für die direkte Übertragung von relevanten Daten ins Flugzeugcockpit geeignet ist. Dies kann die Flugsicherheit und Effizienz verbessern, indem Piloten aktuelle Informationen in Echtzeit erhalten.',
			),
			array(
				'For each of these applications, a mission design study is carried out in the course of subproject 4, in which a possible later satellite realization is fundamentally examined and its feasibility evaluated. These comprise the definition of requirements, mission and system design including orbit design and satellite design, the calculation of the required resources such as energy, data transmission and link budgets, and a feasibility analysis examining technical and schedule feasibility. For the radiosonde application, a demonstrator is additionally developed that can exchange data with a satellite by way of example.',
				'Für jede dieser Anwendungen wird im Verlauf von Teilprojekt 4 jeweils eine Missionsdesignstudie durchgeführt, in welcher eine mögliche spätere Satellitenrealisierung grundlegend untersucht und deren Machbarkeit evaluiert wird. Diese umfassen die Definition der Anforderungen, das Mission & Systemdesign mit Orbitdesign und Satellitendesign, die Berechnung der benötigten Ressourcen wie Energie, Datenübertragung und Link-Budgets sowie eine Machbarkeitsanalyse zur Untersuchung der technischen und zeitlichen Machbarkeit. Für die Anwendung mit den Radiosonden wird zusätzlich ein Demonstrator entwickelt, der exemplarisch mit einem Satelliten Daten austauschen kann.',
			),
		),
	),
	5 => array(
		'title' => array( 'Communication with Nanosatellites', 'Kommunikation mit Kleinstsatelliten' ),
		'lead'  => array( 'DLR & Micro-Epsilon', 'DLR & Micro-Epsilon' ),
		'short' => array(
			'Development of innovative communication systems for reliable data exchange with nanosatellites, including optical communication technologies.',
			'Entwicklung innovativer Kommunikationssysteme für den zuverlässigen Datenaustausch mit Kleinstsatelliten, einschließlich optischer Kommunikationstechnologien.',
		),
		'body'  => array(
			array(
				'Subproject 5 focuses on the development and optimization of communication systems for nanosatellites, with particular emphasis on new optical communication technologies. The German Aerospace Center (DLR) has developed the world\'s smallest commercially available laser communication terminal, designed specifically for use on small and nanosatellites. Within the FORnanoSatellites research consortium, the DLR deals with aspects of miniaturization on the telecommunications side of nanosatellites.',
				'Das Teilprojekt 5 fokussiert sich auf die Entwicklung und Optimierung von Kommunikationssystemen für Kleinstsatelliten mit besonderem Schwerpunkt auf neuen optischen Kommunikationstechnologien. Das Deutsche Zentrum für Luft- und Raumfahrt (DLR) hat das kleinste kommerziell verfügbare Laserkommunikationsterminal der Welt entwickelt, welches speziell für den Einsatz auf Klein- und Kleinstsatelliten gedacht ist. Im Rahmen des Forschungsverbundes FORnanoSatellites beschäftigt sich das DLR mit Aspekten der Miniaturisierung bei der Telekommunikationsseite von Kleinstsatelliten.',
			),
			array(
				'The development of compact communication modules is at the center of the subproject. Special micro-mirror systems for laser communication between satellites and for communication between satellites and ground stations or aircraft are investigated. These so-called Fast-Steering-Mirror (FSM) systems provide rapid alignment of the mirrors in order to maintain communication, for example, between satellites up to 5,000 km apart and moving at 25,000 km/s, in a way that cannot be intercepted.',
				'Die Entwicklung kompakter Kommunikationsmodule steht im Mittelpunkt des Teilprojekts. Dabei werden spezielle Mikrospiegelsysteme für die Laser-Kommunikation zwischen Satelliten untereinander und für die Kommunikation zwischen Satelliten und Bodenstationen oder Flugzeugen untersucht. Diese sogenannten Fast-Steering-Mirror (FSM)-Systeme sorgen für eine schnelle Ausrichtung der Spiegel, um die Kommunikation zwischen beispielsweise bis zu 5.000 km entfernten und sich mit 25.000 km/s bewegenden Satelliten abhörsicher aufrecht zu erhalten.',
			),
			array(
				'Tesat\'s world-smallest satellite terminal is considered in the project and is to be integrated into a nanosatellite for the first time. A special number-cruncher processor is developed as part of the payload computer to control the satellite terminal. The commanding of the satellite terminal, including the adjustment of the micro-optics, is realized by a special core developed in subproject 2.',
				'Das weltweit kleinste Satellitenterminal von Tesat wird im Projekt berücksichtigt und soll erstmalig in einem Kleinstsatelliten integriert werden. Für die Ansteuerung des Satellitenterminals wird ein spezieller Number-Cruncher-Prozessor als Teil des Payload-Computers entwickelt. Die Kommandierung des Satellitenterminals inklusive der Justierung der Mikrooptiken wird durch einen in Teilprojekt 2 entwickelten Spezialkern realisiert.',
			),
			array(
				'Inter-satellite links for constellations are investigated to enable communication between several satellites in a formation. This is particularly important for satellite networks that are to ensure continuous coverage and data transmission. High-rate communication for Earth observation data is another focus, since the recorded multispectral images and sensor data must be transmitted efficiently to Earth.',
				'Inter-Satellite-Links für Konstellationen werden untersucht, um die Kommunikation zwischen mehreren Satelliten in einer Formation zu ermöglichen. Dies ist besonders wichtig für Satellitennetze, die eine kontinuierliche Abdeckung und Datenübertragung gewährleisten sollen. Die Hochratenkommunikation für Erdbeobachtungsdaten ist ein weiterer Schwerpunkt, da die aufgenommenen multispektralen Bilder und Sensordaten effizient zur Erde übertragen werden müssen.',
			),
			array(
				'The software-defined radio implementation offers flexibility in adapting communication protocols and frequency bands. In addition to the frequency bands currently in use, future communication standards for satellite production are developed, also taking the necessary production aspects into account, in particular the use of automatable measurement and test technology.',
				'Die Software-Defined Radio Implementierung bietet Flexibilität bei der Anpassung der Kommunikationsprotokolle und Frequenzbänder. Neben den aktuell genutzten Frequenzbändern werden zukünftige Kommunikationsstandards für die Satellitenproduktion erarbeitet, wobei auch die notwendigen Produktionsaspekte berücksichtigt werden, insbesondere die Verwendung automatisierbarer Mess- und Prüftechnik.',
			),
			array(
				'Ground station concepts and the network architecture are developed to ensure a reliable connection between the nanosatellites and the ground stations. The integration of the test environment into the digital production environment of small-satellite production is an important aspect for increasing the reliability of the assemblies and reducing test times. Automated and parallelized tests of radio subsystems are demonstrated, using measurement equipment and devices for orbit simulation.',
				'Bodenstationskonzepte und die Netzwerkarchitektur werden entwickelt, um eine zuverlässige Verbindung zwischen den Kleinstsatelliten und den Bodenstationen zu gewährleisten. Die Integration der Testurgebung in die digitale Produktionsumgebung der Kleinsatellitenproduktion ist ein wichtiger Aspekt, um die Zuverlässigkeit der Baugruppen zu erhöhen und Testzeiten zu reduzieren. Automatisierte und parallelisierte Tests von Radio-Subsystemen werden demonstriert, wobei Mess-Equipment und Geräte für Orbitsimulationen zum Einsatz kommen.',
			),
		),
	),
	6 => array(
		'title' => array( 'Knowledge-Based Web Configurator', 'Wissensbasierter Web-Konfigurator' ),
		'lead'  => array( 'FAU FAPS & Lino', 'FAU FAPS & Lino' ),
		'short' => array(
			'Development of an intelligent platform for the digital configuration and design of nanosatellite missions with automated generation of manufacturing instructions.',
			'Entwicklung einer intelligenten Plattform zur digitalen Konfiguration und Auslegung von Kleinstsatelliten-Missionen mit automatisierter Generierung von Fertigungsanweisungen.',
		),
		'body'  => array(
			array(
				'Subproject 6 develops a knowledge-based web configurator for the planning and configuration of nanosatellite missions. The web configurator is the central interface between users and automated satellite production and enables even SMEs to configure and order customer-specific nanosatellites.',
				'Das Teilprojekt 6 entwickelt einen wissensbasierten Web-Konfigurator für die Planung und Konfiguration von Kleinstsatelliten-Missionen. Der Web-Konfigurator bildet die zentrale Schnittstelle zwischen Anwendern und der automatisierten Satellitenproduktion und ermöglicht es auch KMUs, kundenindividuelle Kleinstsatelliten zu konfigurieren und zu bestellen.',
			),
			array(
				'The functions required by the customer, in particular for acquiring, processing and storing information, energy and matter, can be selected, evaluated and combined with the help of the web-based configurator from a modular kit for sensors, actuators, data transmission, on-board data processing and energy generation and distribution. The concept is based on a hardware/software module concept comparable to system-on-chip approaches.',
				'Die kundenspezifisch geforderten Funktionen insbesondere zur Gewinnung, Verarbeitung und Speicherung von Informationen, Energie und Materie können mit Hilfe des webbasierten Konfigurators aus einem modularen Baukasten für Sensorik, Aktuatorik, Datenübertragung, Borddatenverarbeitung sowie Energie-Erzeugung und -Verteilung ausgewählt, bewertet und kombiniert werden. Das Konzept orientiert sich an einem Hardware-/Software-Modulkonzept vergleichbar mit System-on-Chip Ansätzen.',
			),
			array(
				'From this customer interface, the control data for production in different semiconductor manufacturing technologies for automated assembly as well as the entire logistics are derived automatically. The integration platform "Lino Hub" and the associated configuration service form the technical basis for the configurator. The web-based configurator makes it possible to realize a consistently digitalized order-processing process that gives SMEs in particular easy access to customer-specific applications of nanosatellites in different fields.',
				'Aus dieser Kundenschnittstelle werden die Steuerdaten für die Produktion in unterschiedlichen Halbleiterfertigungstechnologien für die automatisierte Montage sowie die gesamte Logistik automatisiert abgeleitet. Die Integrationsplattform "Lino Hub" und der zugehörige Konfigurationsservice bilden die technische Basis für den Konfigurator. Anhand des webbasierten Konfigurators lässt sich ein durchgängig digitalisierter Auftragsabwicklungsprozess realisieren, der insbesondere KMUs einen leichten Zugang zu kundenindividuellen Anwendungen von Kleinstsatelliten in unterschiedlichen Bereichen eröffnet.',
			),
			array(
				'Knowledge-based system configuration makes it possible to automatically suggest suitable components and subsystems based on the application requirements. An automatic consistency check ensures that the chosen configuration is technically feasible and that all dependencies between the components are taken into account. This also includes checking electrical interfaces, mechanical dimensions and the compatibility of the subsystems.',
				'Die wissensbasierte Systemkonfiguration ermöglicht es, auf Basis der Anwendungsanforderungen automatisch geeignete Komponenten und Subsysteme vorzuschlagen. Eine automatische Konsistenzprüfung stellt sicher, dass die gewählte Konfiguration technisch realisierbar ist und alle Abhängigkeiten zwischen den Komponenten berücksichtigt werden. Dies umfasst auch die Überprüfung von elektrischen Schnittstellen, mechanischen Abmessungen und der Kompatibilität der Subsysteme.',
			),
			array(
				'The integration of generic computing modules and configurable OBC and payload processors from subproject 2 makes it possible to tailor the computer architecture to the application. The components of the satellite bus and the communication system specified in subproject 1 are also taken into account in the web configurator. The results of the feasibility study on assembly and interconnection technology from subproject 3 flow into the configurator for individual components.',
				'Die Integration von generischen Rechenmodulen und konfigurierbaren OBC- und Payload-Prozessoren aus Teilprojekt 2 ermöglicht es, die Rechnerarchitektur gezielt auf die Anwendung auszurichten. Auch die in Teilprojekt 1 spezifizierten Komponenten des Satellitenbusses und des Kommunikationssystems werden im Web-Konfigurator berücksichtigt. Die Ergebnisse der Machbarkeitsstudie zur Aufbau- und Verbindungstechnik aus Teilprojekt 3 fließen für einzelne Komponenten in den Konfigurator ein.',
			),
			array(
				'Collaborative mission planning is supported by allowing several stakeholders to work on the configuration together. The generated assembly instructions for nanosatellites are transferred directly to the manufacturing systems, with NC control data from the configurator being adopted as automatically as possible. This extends existing nanosatellite solutions with design automation and enables a continuous digital process chain from configuration to production.',
				'Kollaborative Missionsplanung wird unterstützt, indem mehrere Stakeholder gemeinsam an der Konfiguration arbeiten können. Die generierten Montageanweisungen für Kleinstsatelliten werden direkt an die Fertigungsanlagen übertragen, wobei NC-Steuerdaten aus dem Konfigurator möglichst automatisiert übernommen werden können. Dies erweitert die vorhandenen Kleinstsatelliten-Lösungen um Design Automation und ermöglicht eine durchgängige digitale Prozesskette von der Konfiguration bis zur Fertigung.',
			),
			array(
				'The configurator offers a user-friendly interface for selecting and evaluating components and can be supported by training and consulting from the partners. The configurator is presented as a click demonstrator on the web pages to be created for the FORnanoSatellites project; it is web-based and can therefore be used by anyone.',
				'Der Konfigurator bietet eine benutzerfreundliche Oberfläche zur Auswahl und Bewertung von Komponenten und kann durch Schulungen und Beratung durch die Partner unterstützt werden. Die Präsentation des Konfigurators erfolgt durch einen Klick-Demonstrator auf den zu schaffenden Web-Seiten des Projekts FORnanoSatellites, der webbasiert ist und somit von jedem benutzt werden kann.',
			),
		),
	),
);
