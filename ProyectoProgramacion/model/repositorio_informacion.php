<?php
	class Repositorio{
		private static $departamentos = [
			1 => "Amazonas",
			2 => "Antioquia",
			3 => "Arauca",
			4 => "Atlántico",
			5 => "Bolivar",
			6 => "Boyacá",
			7 => "Caldas",
			8 => "Caquetá",
			9 => "Casanare",
			10 => "Cauca",
			11 => "Cesar",
			12 => "Chocó",
			13 => "Córdoba",
			14 => "Cundinamarca",
			15 => "Guainía",
			16 => "Guaviare",
			17 => "Huila",
			18 => "Guajira",
			19 => "Magdalena",
			20 => "Meta",
			21 => "Nariño",
			22 => "Norte De Santander",
			23 => "Putumayo",
			24 => "Quindio",
			25 => "Risaralda",
			26 => "San Andres y Providencia",
			27 => "Santander",
			28 => "Sucre",
			29 => "Tolima",
			30 => "Valle Del Cauca",
			31 => "Vaupés",
			32 => "Vichada",
		];
		private static $municipios = [
			1 => [1 => "El Encanto", 2 => "La Chorrera", 3 => "La Pedrera", 4 => "La Victoria", 5 => "Leticia", 6 => "Mirití-Paraná", 7 => "Puerto Alegría", 8 => "Puerto Arica", 9 => "Puerto Nariño", 10 => "Puerto Santander", 11 => "Tarapacá"],
			2 => [1 => "Abejorral", 2 => "Alejandría", 3 => "Andes", 4 => "Anzá", 5 => "Argelia", 6 => "Armenia", 7 => "Belmira", 8 => "Betania", 9 => "Betulia", 10 => "Caldas", 11 => "Caracolí", 12 => "Caucasia", 13 => "Ciudad Bolivar", 14 => "Concepción", 15 => "Concordia", 16 => "Dabeiba", 17 => "El Peñol", 18 => "Envigado", 19 => "Fredonia", 20 => "Frontino", 21 => "Giraldo", 22 => "Granada", 23 => "Guadalupe", 24 => "Guatapé", 25 => "Itagüí", 26 => "Jericó", 27 => "La Unión", 28 => "Medellín", 29 => "Montebello", 30 => "Nariño", 31 => "Olaya", 32 => "Puerto Berrío", 33 => "Puerto Triunfo", 34 => "Rionegro", 35 => "Sabanalarga", 36 => "Salgar", 37 => "San Carlos", 38 => "San francisco", 39 => "San Luis", 40 => "San Rafael", 41 => "San Roque", 42 => "Santa Bárbara", 43 => "Santa Fe de Antioquia", 44 => "Santo Domingo", 45 => "Zaragoza"], 
			3 => [1 => "Arauca", 2 => "Arauquita", 3 => "Cravo Norte", 4 => "Fortul", 5 => "Puerto Rondón", 6 => "Saravena", 7 => "Tame"],
			4 => [1 => "Baranoa", 2 => "Barranquilla", 3 => "Campo de la Cruz", 4 => "Candelaria", 5 => "Galapa", 6 => "Juan de Acosta", 7 => "Luruaco", 8 => "Malambo", 9 => "Manatí", 10 => "Palmar de Varela", 11 => "Piojó", 12 => "Polonuevo", 13 => "Ponedera", 14 => "Puerto Colombia", 15 => "Repelón", 16 => "Sabanagrande", 17 => "Sababalarga", 18 => "Santa Lucía", 19 => "Santo Tomás", 20 => "Soledad", 21 => "Suán", 22 => "Tubará", 23 => "Usiacurí"],
			5 => [1 => "Achí", 2 => "Altos del Rosario", 3 => "Arenal", 4 => "Arjona", 5 => "Arroyohondo", 6 => "Barranco de Loba", 7 => "Calamar", 8 => "Cantagallo", 9 => "El Carmen de Bolívar", 10 => "Cartagena de Indias", 11 => "Cicuco", 12 => "Clemencia", 13 => "Córdoba", 14 => "El Guamo", 15 => "El Peñón", 16 => "Hatillo de Loba", 17 => "Magangué", 18 => "Mahates", 19 => "Margarita", 20 => "María la Baja", 21 => "Montecristo", 22 => "Morales", 23 => "Norosí", 24 => "Pinillos", 25 => "Regidor", 26 => "Río Viejo", 27 => "San Cristóbal", 28 => "San Estanislao", 29 => "San Fernando", 30 => "San Jacinto", 31 => "San Jacinto del Cauca", 32 => "San Juan Nepomuceno", 33 => "San Martín de Loba", 34 => "San Pablo", 35 => "Santa Catalina", 36 => "Santa Cruz de Mompox", 37 => "Santa Rosa", 38 => "Santa Rosa del Sur", 39 => "Simití", 40 => "Soplaviento", 41 => "Talaigua Nuevo", 42 => "Tiquisio", 43 => "Turbaco"],
			6 => [1 => "Almeida", 2 => "Aquitania", 3 => "Belén", 4 => "Boyacá", 5 => "Buenavista", 6 => "Caldas", 7 => "Chiquinquirá", 8 => "Ciénega", 9 => "Cómbita", 10 => "Corrales", 11 => "Cubará", 12 => "El Espino", 13 => "Floresta", 14 => "Garagoa", 15 => "Jericó", 16 => "La victoria", 17 => "Miraflores", 18 => "Nuevo Colón", 19 => "Otanche", 20 => "Paéz", 21 => "Pax de Rio", 22 => "Puerto Boyacá", 23 => "San Eduardo", 24 => "San Mateo", 25 => "Santa Maria", 26 => "Santa Sofía", 27 => "Santana", 28 => "Socha", 29 => "Susacón", 30 => "Sutatenza", 31 => "Tasco", 32 => "Tibaná", 33 => "Tipacoque", 34 => "Toca", 35 => "Togui", 36 => "Tunja", 37 => "Tutazá", 38 => "Umbitá", 39 => "Ventaquemada", 40 => "Villa de Leyva", 41 => "Viracachá", 42 => "Zetaquira"],
			7 => [1 => "Aguadas", 2 => "Anserma", 3 => "Aranzazu", 4 => "Belalcázar", 5 => "Chinchiná", 6 => "Filadelfia", 7 => "La Dorada", 8 => "La Merced", 9 => "Manizales", 10 => "Manzanares", 11 => "Marmato", 12 => "Marquetalia", 13 => "Filadelfia", 14 => "Filadelfia", 15 => "Marulanda", 16 => "Neira", 17 => "Norcasia", 18 => "Pácora", 19 => "Palestina", 20 => "Pensilvania", 21 => "Riosucio", 22 => "Risaralda", 23 => "Salamina", 24 => "Samaná", 25 => "San José", 26 => "Supía", 27 => "Victoria", 28 => "Villamaría", 29 => "Viterbo"],
			8 => [1 => "Albania", 2 => "Belén de los Andaquies", 3 => "Cartagena del Chairá", 4 => "Curillo", 5 => "El Doncello", 6 => "El Paujil", 7 => "Florencia", 8 => "La Montañita", 9 => "Morelia", 10 => "Puerto Milán", 11 => "Puerto Rico", 12 => "San José del Fragua", 13 => "San Vicente del Caguán", 14 => "Solano", 15 => "Solita", 16 => "Valparaíso"],
			9 => [1 => "Aguazul", 2 => "Chámeza", 3 => "Hato Corozal", 4 => "La Salina", 5 => "Maní", 6 => "Monterrey", 7 => "Nunchía", 8 => "Orocué", 9 => "Paz de Ariporo", 10 => "Pore", 11 => "Recetor", 12 => "Sabanalarga", 13 => "Sácama", 14 => "San Luis de Palenque", 15 => "Támara", 16 => "Tauramena", 17 => "Trinidad", 18 => "Villanueva", 19 => "Yopal"],
			10 => [1 => "Almaguer", 2 => "Argelia", 3 => "Balboa", 4 => "Bolívar", 5 => "Buenos Aires", 6 => "Cajibio", 7 => "Caldono", 8 => "Caloto", 9 => "Corinto", 10 => "El Tambo", 11 => "Florencia", 12 => "Guapi", 13 => "Inza", 14 => "Jambaló", 15 => "La Sierra", 16 => "La Vega", 17 => "López", 18 => "Mercaderes", 19 => "Miranda", 20 => "Morales", 21 => "Padilla", 22 => "Páez", 23 => "Patia", 24 => "Piamonte", 25 => "Piendamo", 26 => "Popayán", 27 => "Puerto Tejada", 28 => "Purace", 29 => "Rosas", 30 => "San Sebastián", 31 => "Santa Rosa", 32 => "Santander de Quilichao", 33 => "Silvia", 34 => "Sotara", 35 => "Suárez", 36 => "Sucre", 37 => "Timbío", 38 => "Timbiquí", 39 => "Toribio", 40 => "Totoro", 41 => "Villa Rica"],
			11 => [1 => "Aguachica", 2 => "Agustín Codazzi", 3 => "Astrea", 4 => "Becerril", 5 => "Bosconia", 6 => "Chimichagua", 7 => "Chiriguaná", 8 => "Curumaní", 9 => "El Copey", 10 => "El Paso", 11 => "Gamarra", 12 => "González", 13 => "La Gloria", 14 => "La Jagua Ibirico", 15 => "Manaure Balcón Del Cesar", 16 => "Pailitas", 17 => "Pelaya", 18 => "Pueblo Bello", 19 => "Río De Hora", 20 => "Robles", 21 => "San Alberto", 22 => "San Diego", 23 => "San Martín", 24 => "Tamalameque", 25 => "Valledupar"],
			12 => [1 => "Acandí", 2 => "Alto Baudó", 3 => "Atrato", 4 => "Bagadó", 5 => "Bahía Solano", 6 => "Bajo Baudó", 7 => "Bojayá", 8 => "Cértegui", 9 => "Condoto", 10 => "El Cantón de San Pablo", 11 => "El Carmen de Atrato", 12 => "El Carmen del Darién", 13 => "Litoral del San Juan", 14 => "Istmina", 15 => "Juradó", 16 => "Lloró", 17 => "Medio Atrato", 18 => "Medio Baudó", 19 => "Medio San Juan", 20 => "Nóvita", 21 => "Nuquí", 22 => "Quibdó", 23 => "Río Iró", 24 => "Río Quito", 25 => "Riosucio", 26 => "San José del Palmar", 27 => "Sipí", 28 => "Tadó", 29 => "Unguía", 30 => "Unión Panamericana"],
			13 => [1 => "Ayapel", 2 => "Buenavista", 3 => "Canalete", 4 => "Cereté", 5 => "Chimá", 6 => "Chinú", 7 => "Ciénaga de Oro", 8 => "Cotorra", 9 => "La Apartada", 10 => "Los Córdobas", 11 => "Momil", 12 => "Montelibano", 13 => "Monteria", 14 => "Moñitos", 15 => "Planeta Rica", 16 => "Pueblo Nuevo", 17 => "Puerto Escondido", 18 => "Puerto Libertador", 19 => "Purisima", 20 => "Sahagún", 21 => "San Andres de Sotavento", 22 => "San Antero", 23 => "San Bernardo del Viento", 24 => "San Carlos", 25 => "San José de Uré", 26 => "San Pelayo", 27 => "Santa Cruz de Lorica", 28 => "Tierralta", 29 => "Tuchín", 30 => "Valencia"],
			14 => [1 => "Agua de Dios", 2 => "Alban", 3 => "Anapoima", 4 => "Anolaima", 5 => "Beltrán", 6 => "Bojacá", 7 => "Cabrera", 8 => "Cajicá", 9 => "Caqueza", 10 => "Carmen de Carupa", 11 => "Chaguaní", 12 => "Chipaque", 13 => "Chocontá", 14 => "Cota", 15 => "Cuncunubá", 16 => "El Colegio", 17 => "El Peñón", 18 => "Fómeque", 19 => "Fosca", 20 => "Gachalá", 21 => "Gacheta", 22 => "Girardot", 23 => "Granada", 24 => "Graduas", 25 => "Guataquí", 26 => "Guayabetal", 27 => "Gutiérrez", 28 => "Jerusalén", 29 => "El Calera", 30 => "La Mesa", 31 => "La Palma", 32 => "La Peña", 33 => "La Vega", 34 => "Machetá", 35 => "Madrid", 36 => "Medina", 37 => "Mosquera", 38 => "Nariño", 39 => "Nilo", 40 => "Nocaima", 41 => "Pacho", 42 => "Paime", 43 => "Pasca", 44 => "Puerto Salgar", 45 => "Pulí", 46 => "Quebradagrande", 47 => "Rafael Reyes", 48 => "Ricaurte", 49 => "San Antonio del Tequendama", 50 => "San Bernardo", 51 => "San Cayetano", 52 => "San Fransisco", 53 => "Silvania", 54 => "Soacha", 55 => "Sutatausa", 56 => "Tabio", 57 => "Tausa", 58 => "Tocaima", 59 => "Topaipí", 60 => "Ubalá", 61 => "Ubaque", 62 => "Ubaté", 63 => "Utica", 64 => "Vergara", 65 => "Villagomez", 66 => "Villapinzón", 67 => "Villeta", 68 => "Yacopí", 69 => "Zipacón", 70 => "Zipaquirá"],
			15 => [1 => "Barrancominas", 2 => "Cacahual", 3 => "Inírida", 4 => "La Guadalupe", 5 => "Mapiripana", 6 => "Morichal Nuevo", 7 => "Pana Pana", 8 => "Puerto Colombia", 9 => "San Felipe"],
			16 => [1 => "Calamar", 2 => "El Retorno", 3 => "Miraflores", 4 => "San José del Guaviare"],
			17 => [1 => "Acevedo", 2 => "Aipe", 3 => "Algeciras", 4 => "Altamira", 5 => "Boraya", 6 => "Campoalegre", 7 => "Colombia", 8 => "Elías", 9 => "El Agrado", 10 => "Garzón", 11 => "Gigante", 12 => "Guadalupe", 13 => "Hobo", 14 => "Íquira", 15 => "Isnos", 16 => "La Argentina", 17 => "La Plata", 18 => "Nátaga", 19 => "Neiva", 20 => "Oporapa", 21 => "Paicol", 22 => "Palermo", 23 => "Palestina", 24 => "Pital", 25 => "Pitalito", 26 => "Rivera", 27 => "Salado Blanco", 28 => "Santa Maria", 29 => "San Agustín" , 30 => "Suaza", 31 => "Tarqui", 32 => "Tello", 33 => "Teruel", 34 => "Tesalia", 35 => "Timaná", 36 => "Villavieja", 37 => "Yaguará"],
			18 => [1 => "Albaina", 2 => "Barrancas", 3 => "Dibulla", 4 => "Distracción", 5 => "El Molino", 6 => "Fonseca", 7 => "Hatonuevo", 8 => "La Jagua del Pilar", 9 => "Maicao", 10 => "Manaure", 11 => "Riohacha", 12 => "San Juan del Cesar", 13 => "Uribia", 14 => "Urumita", 15 => "Villanueva"],
			19 => [1 => "Algarrobo", 2 => "Aracataca", 3 => "Ariguaní", 4 => "Cerro de San Antonio", 5 => "Chibolo", 6 => "Ciénaga", 7 => "Concordia", 8 => "El Banco", 9 => "El Piñon", 10 => "El Retén", 11 => "Fundación", 12 => "Guamal", 13 => "Nueva Granada", 14 => "Pedraza", 15 => "Pijiño del Carmen", 16 => "Pivijay", 17 => "Plato", 18 => "Pueblo Viejo", 19 => "Remolino", 20 => "Sabanas de San Ángel", 21 => "Salamina", 22 => "San Sebastían de Buenavista", 23 => "Santa Ana", 24 => "Santa Bárbara de Pinto", 25 => "Santa Marta", 26 => "San Zenón", 27 => "Sitionuevo", 28 => "Tenerife", 29 => "Zapayán", 30 => "Zona Bananera"],
			20 => [1 => "Acacías", 2 => "Barranca de Upia", 3 => "Cabuyaro", 4 => "Castilla La Nueva", 5 => "Cubarral", 6 => "Cumaral", 7 => "El Calvario", 8 => "El Castillo", 9 => "El Dorado", 10 => "Fuente de Oro", 11 => "Granada", 12 => "Guamal", 13 => "La Macarena", 14 => "La Uribe", 15 => "Lejanías", 16 => "Mapiripán", 17 => "Mesetas", 18 => "Puerto Concordia", 19 => "Puerto Gaitán", 20 => "Puerto Lleras", 21 => "Puerto López", 22 => "Puerto Rico", 23 => "Restrepo", 24 => "San Carlos de Guaroa", 25 => "San Juan de Arama", 26 => "San Juanito", 27 => "San Martín", 28 => "Villavicencio", 29 => "Vista Hermosa"],
			21 => [1 => "Aldana", 2 => "Ancuya", 3 => "Arboleda", 4 => "Barbacoas", 5 => "Belén", 6 => "Chachagüi", 7 => "Colón", 8 => "Consacá", 9 => "Contadero", 10 => "Cuaspud", 11 => "Cumbal", 12 => "Cumbitara", 13 => "Córdoba", 14 => "El Charco", 15 => "El Peñol", 16 => "El Rosario", 17 => "El Tablón", 18 => "El Tambo", 29 => "Francisco Pizarro", 30 => "Guachucal", 31 => "Gualmatán", 32 => "Imués", 33 => "Ipiales", 34 => "La Cruz", 35 => "La Florida", 36 => "La Llanada", 37 => "La Tola", 38 => "La Unión", 39 => "Leiva", 40 => "Linares", 41 => "Los Andes", 42 => "Mallama", 43 => "Mosquera", 44 => "Nariño", 45 => "Olaya Herrera", 46 => "Ospina", 47 => "Pasto", 48 => "Policarpa", 49 => "Potosi", 50 => "Providencia", 51 => "Pupiales", 52 => "Ricaurte", 53 => "Roberto Payán", 54 => "San Bernardo", 55 => "San Lorenzo", 54 => "San Pablo", 55 => "San Pedro de Cartago", 56 => "Santa Bárbara", 57 => "Santacruz", 58 => "Sapuyes", 59 => "Taminango", 60 => "Tangua", 61 => "Tumaco", 62 => "Túquerres", 63 => "Yacuanquer"],
			22 => [1 => "Abrego", 2 => "Arboledas", 3 => "Bochalema", 4 => "Bucarasica", 5 => "Cáchira", 6 => "Cácota", 7 => "Chinácota", 8 => "Chitagá", 9 => "Convención", 10 => "Cucutilla", 11 => "Durania", 12 => "El Carmen", 13 => "El Tarra", 14 => "El Zulia", 15 => "Gramalote", 16 => "Hacarí", 17 => "Herrán", 18 => "La Esperanza", 19 => "La Playa de Belén", 20 => "Labateca", 21 => "Los Patios", 22 => "Loudes", 23 => "Mutiscua", 24 => "Ocaña", 25 => "Pamplona", 26 => "Pamplonita", 27 => "Puerto Santander", 28 => "Rangonvalia", 29 => "Salazar de las Palmas", 30 => "San Calixto", 31 => "San Cayetano", 32 => "San José de Cucuta", 33 => "Santiago", 34 => "Sardinata", 35 => "Silos", 36 => "Teorama", 37 => "Tibú", 38 => "Toledo", 39 => "Villa Caro", 40 => "Villa del Rosario"],
			23 => [1 => "Colón", 2 => "Mocoa", 3 => "Orito", 4 => "Puerto Asís", 5 => "Puerto Caicedo", 6 => "Puerto Guzmán", 7 => "Puerto Leguízamo", 8 => "San Francisco", 9 => "San Miguel", 10 => "Santiago", 11 => "Sibundoy", 12 => "Valle del Guamuez", 13 => "Villagarzón"],
			24 => [1 => "Armenia", 2 => "Buenavista", 3 => "Calarcá", 4 => "Circasia", 5 => "Córdoba", 6 => "Filandia", 7 => "Génova", 8 => "La Tebaida", 9 => "Montenegro", 10 => "Pijao", 11 => "Quimbaya", 12 => "Salento"],
			25 => [1 => "Apía", 2 => "Balboa", 3 => "Belén de Umbriá", 4 => "Dosquebradas", 5 => "Guática", 6 => "La Celia", 7 => "La Virginia", 8 => "Marsella", 9 => "Mistrató", 10 => "Pereira", 11 => "Pueblo Rico", 12 => "Quinchía", 13 => "Santa Rosa de Cabal", 14 => "Santuario"],
			26 => [1 => "San Andres", 2 => "Providencia y Santa Catalina Islas"],
			27 => [1 => "Aguada", 2 => "Albaina", 3 => "Aratoca", 4 => "Barbosa", 5 => "Barichara", 6 => "Barrancabermeja", 7 => "Betulia", 8 => "Bolivar", 9 => "Bucaramanga", 10 => "Cabrera", 11 => "California", 12 => "Carcasí", 13 => "Cepitá", 14 => "Charalá", 15 => "Charta", 16 => "Chima", 17 => "Concepción", 18 => "Coromoro", 19 => "Curití", 20 => "El Camen de Chucurí", 21 => "El Guacamayo", 22 => "El Peñon", 23 => "El Playón", 24 => "Florián", 25 => "Floridablanca", 26 => "Galán", 27 => "Girón", 28 => "Gauca", 29 => "Guadalupe", 30 => "Guavatá", 31 => "Hato", 32 => "Jesús María", 33 => "Jordán", 34 => "La Paz", 35 => "Los Santos", 36 => "Málaga", 37 => "Ocamonte", 38 => "Palmar", 39 => "Palmas del Socorro", 40 => "Páramo", 41 => "Piedecuesta", 42 => "Puente Nacional", 43 => "Puerto Parra", 44 => "Rionegro", 45 => "Sabana de Torres", 46 => "San Andrés", 47 => "San Benito", 48 => "San Joaquín", 49 => "San José de Mirando", 50 => "San Miguel", 51 => "Santa Bárbara", 52 => "Santa Helena del Opón", 53 => "Simacota", 54 => "Socorro", 55 => "Suaita", 56 => "Sucre", 57 => "Tona", 58 => "Valle de san José", 59 => "Velez", 60 => "Vetas", 61 => "Villanueva", 62 => "Zapatoca"],
			28 => [1 => "Buenavista", 2 => "Caimito", 3 => "Coloso", 4 => "Corozal", 5 => "Chalán", 6 => "El Roble", 7 => "Galeras", 8 => "Guaranda", 9 => "La Unión", 10 => "Los Palmitos", 11 => "Majagual", 12 => "Morroa", 13 => "Ovejas", 14 => "Palmito", 15 => "Sampues", 16 => "San Benito Abad", 17 => "San Juan de Betulia", 18 => "San Marcos", 19 => "San Onofre", 20 => "San Pedro", 21 => "Sincé", 22 => "Sincelejo", 23 => "Sucre", 24 => "Tolú", 25 => "Toluviejo"],
			29 => [1 => "Alpujarra", 2 => "Alvarado", 3 => "Ambalema", 4 => "Anzoátegui", 5 => "Armero Guayabal", 6 => "Ataco", 7 => "Cajamarca", 8 => "Carmen de Apicalá", 9 => "Casabianca", 10 => "Chaparral", 11 => "Coello", 12 => "Coyaima", 13 => "Cunday", 14 => "Dolores", 15 => "El Espinal", 16 => "El Guamo", 17 => "Falan", 18 => "Flandes", 19 => "Fresno", 20 => "Herveo", 21 => "Honda", 22 => "Ibagué", 23 => "Icononzo", 24 => "Lérida", 25 => "Líbano", 26 => "Melgar", 27 => "Mirillo", 28 => "Natagaima", 29 => "Ortega", 30 => "Palocabildo", 31 => "Piedras", 32 => "Planadas", 33 => "Prado", 34 => "Purificación", 35 => "Rioblanco", 36 => "Roncesvalles", 37 => "Rovira", 38 => "Saldaña", 39 => "San Antonio", 40 => "San Luis", 41 => "San Sebastian de Mariquita", 42 => "Santa Isabel", 43 => "Suárez", 44 => "Valle de San Juan", 45 => "Venadillo", 46 => "Villahermosa", 47 => "Villarrica"],
			30 => [1 => "Alcalá", 2 => "Andalucía", 3 => "Ansermanuevo", 4 => "Argelia", 5 => "Bolívar", 6 => "Buenaventura", 7 => "Buga", 8 => "Bugalagrande", 9 => "Caicedonia", 10 => "Cali", 11 => "Calima", 12 => "Candelaria", 13 => "Cartago", 14 => "Dagua", 15 => "El Águila", 16 => "El Cairo", 17 => "El Cerrito", 18 => "El Dovio", 19 => "Florida", 20 => "Ginebra", 21 => "Guacarí", 22 => "Jamundí", 23 => "La Cumbre", 24 => "La Unión", 25 => "La Victoria", 26 => "Obando", 27 => "Palmira", 28 => "Pradera", 29 => "Restrepo", 30 => "Riofrío", 31 => "Roldanillo", 32 => "San Pedro", 33 => "Sevilla", 34 => "Toro", 35 => "Trujillo", 36 => "Tuluá", 37 => "Ulloa", 38 => "Versalles", 39 => "Vijes", 40 => "Yotoco", 41 => "Yumbo", 42 => "Zarzal"],
			31 => [1 => "Carurú", 2 => "Mitú", 3 => "Pacoa", 4 => "Papunaua", 5 => "Taraira", 6 => "Yavaraté"],
			32 => [1 => "Cumaribo", 2 => "La Primavera", 3 => "Puerto Carreño", 4 => "Santa Rosalía"]
		];

		private static $tipoDocumentos = [
			1 => 'Cédula de Ciudadania',
			2 => 'Cédula de Extranjería',
			3 => 'Pasaporte',
			4 => 'Registro Civil',
			5 => 'Tarjeta de indentidad'
		];

		private static $tipoDocumentosSimple = [
			1 => 'CC',
			2 => 'CE',
			3 => 'Pasaporte',
			4 => 'RC',
			5 => 'TI'
		];

		private static $tipoEspecialidadMedico = [
			1 => 'Medico General',
			2 => 'Medico Internista',
			3 => 'Medico Especialista'
		];

		private static $estadoCivil = [
			1 => 'Soltero/a',
			2 => 'Casado/a',
			3 => 'Viudo/a',
			4 => 'Divorsiado/a',
		];

		public static function departamento($id){
			if(isset(self::$departamentos[$id]))
				return self::$departamentos[$id];
			return null;
		}

		public static function lista_departamentos(){
			return self::$departamentos;
		}

		public static function municipio($id_departamento, $id_municipio){
			if(isset(self::$municipios[$id_departamento][$id_municipio]))
				return self::$municipios[$id_departamento][$id_municipio];
			return null;
		}
		
		public static function lista_municipios($id_departamento){
			if(isset(self::$municipios[$id_departamento]))
				return self::$municipios[$id_departamento];
			return null;
		}

		public static function tipoDocumento($id_documento){
			if(isset(self::$tipoDocumentos[$id_documento]))
				return self::$tipoDocumentos[$id_documento];
			return null;
		}

		public static function listaTipoDocumento(){
			return self::$tipoDocumentos;
		}

		public static function tipoDocumentoSimple($id_documento){
			if(isset(self::$tipoDocumentosSimple[$id_documento]))
				return self::$tipoDocumentosSimple[$id_documento];
			return null;
		}

		public static function listaTipoDocumentoSimple(){
			return self::$tipoDocumentosSimple;
		}

		public static function tipoEspecialidad($id_especialidad){
			if(isset(self::$tipoEspecialidadMedico[$id_especialidad]))
				return self::$tipoEspecialidadMedico[$id_especialidad];
			return null;
		}

		public static function listaTipoEspecialidad(){
			return self::$tipoEspecialidadMedico;
		}

		public static function estadoCivil($id_estadoCivil){
			if(isset(self::$estadoCivil[$id_estadoCivil]))
				return self::$estadoCivil[$id_estadoCivil];
			return null;
		}

		public static function listaEstadoCivil(){
			return self::$estadoCivil;
		}
	}
?>