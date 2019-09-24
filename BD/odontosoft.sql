-- --------------------------------------------------------
-- Host:                         localhost
-- Versión del servidor:         5.7.24 - MySQL Community Server (GPL)
-- SO del servidor:              Win64
-- HeidiSQL Versión:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para odontosoft
CREATE DATABASE IF NOT EXISTS `odontosoft` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `odontosoft`;

-- Volcando estructura para tabla odontosoft.estados_provincias
CREATE TABLE IF NOT EXISTS `estados_provincias` (
  `idPais` char(2) NOT NULL,
  `id` int(11) DEFAULT NULL,
  `nombre` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Estados o Provincias según paises';

-- Volcando datos para la tabla odontosoft.estados_provincias: ~50 rows (aproximadamente)
/*!40000 ALTER TABLE `estados_provincias` DISABLE KEYS */;
REPLACE INTO `estados_provincias` (`idPais`, `id`, `nombre`) VALUES
	('VE', 1, 'Amazonas'),
	('VE', 2, 'Anzoátegui'),
	('VE', 3, 'Apure'),
	('VE', 4, 'Aragua'),
	('VE', 5, 'Barinas'),
	('VE', 6, 'Bolívar'),
	('VE', 7, 'Carabobo'),
	('VE', 8, 'Cojedes'),
	('VE', 9, 'Delta Amacuro'),
	('VE', 10, 'Distrito Capital'),
	('VE', 11, 'Falcón'),
	('VE', 12, 'Guárico'),
	('VE', 13, 'Lara'),
	('VE', 14, 'Mérida'),
	('VE', 15, 'Miranda'),
	('VE', 16, 'Monagas'),
	('VE', 17, 'Nueva Esparta'),
	('VE', 18, 'Portuguesa'),
	('VE', 19, 'Sucre'),
	('VE', 20, 'Táchira'),
	('VE', 21, 'Trujillo'),
	('VE', 22, 'Vargas'),
	('VE', 23, 'Yaracuy'),
	('VE', 24, 'Zulia'),
	('VE', 25, 'Dependencias Federales'),
	('PE', 26, 'Amazonas'),
	('PE', 27, 'Áncash'),
	('PE', 28, 'Apurímac'),
	('PE', 29, 'Arequipa'),
	('PE', 30, 'Ayacucho'),
	('PE', 31, 'Cajamarca'),
	('PE', 32, 'Callao'),
	('PE', 33, 'Cusco'),
	('PE', 34, 'Huancavelica'),
	('PE', 35, 'Huánuco'),
	('PE', 36, 'Ica'),
	('PE', 37, 'Junín'),
	('PE', 38, 'La Libertad'),
	('PE', 39, 'Lambayeque'),
	('PE', 40, 'Lima'),
	('PE', 41, 'Loreto'),
	('PE', 42, 'Madre de Dios'),
	('PE', 43, 'Moquegua'),
	('PE', 44, 'Pasco'),
	('PE', 45, 'Piura'),
	('PE', 46, 'Puno'),
	('PE', 47, 'San Martín'),
	('PE', 48, 'Tacna'),
	('PE', 49, 'Tumbes'),
	('PE', 50, 'Ucayali');
/*!40000 ALTER TABLE `estados_provincias` ENABLE KEYS */;

-- Volcando estructura para procedimiento odontosoft.listar_usuarios
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `listar_usuarios`(
in empresaIn varchar(50)
)
BEGIN

	/*SET @t1 =CONCAT("SELECT T0.id, name, lastName, email, email_verified_at, password, remember_token, created_at, updated_at, Empresa, sucursal, status, T1.id as idSucursal, nombre as nombreSucursal, nroFiscal 
    FROM odontosoft.users T0 
    inner join ",empresaIn,".sucursales T1 on T0.sucursal = T1.id where Empresa='",empresaIn,"'");
	PREPARE stmt3 FROM @t1;
	EXECUTE stmt3;
	DEALLOCATE PREPARE stmt3;*/
    
    SELECT T0.id, name, lastName, email, email_verified_at, password, remember_token, created_at, updated_at, Empresa, sucursal, status,especialidadMedica
    FROM odontosoft.users T0 
    where Empresa=empresaIn;
END//
DELIMITER ;

-- Volcando estructura para tabla odontosoft.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla odontosoft.migrations: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
REPLACE INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Volcando estructura para tabla odontosoft.paises
CREATE TABLE IF NOT EXISTS `paises` (
  `idPaises` char(2) NOT NULL,
  `nombrePaises` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idPaises`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla odontosoft.paises: ~245 rows (aproximadamente)
/*!40000 ALTER TABLE `paises` DISABLE KEYS */;
REPLACE INTO `paises` (`idPaises`, `nombrePaises`) VALUES
	('AD', 'Andorra'),
	('AE', 'Emiratos Árabes Unidos'),
	('AF', 'Afganistán'),
	('AG', 'Antigua y Barbuda'),
	('AI', 'Anguilla'),
	('AL', 'Albania'),
	('AM', 'Armenia'),
	('AN', 'Antillas Holandesas'),
	('AO', 'Angola '),
	('AQ', 'Antártida'),
	('AR', 'Argentina'),
	('AS', 'Samoa Americana'),
	('AT', 'Austria '),
	('AU', 'Australia'),
	('AW', 'Aruba'),
	('AZ', 'Azerbayán'),
	('BA', 'Bosnia-Herzegovina'),
	('BB', 'Barbados'),
	('BD', 'Bangladesh'),
	('BE', 'Bélgica'),
	('BF', 'Burkina Faso'),
	('BG', 'Bulgaria'),
	('BH', 'Bahrain'),
	('BI', 'Burundi'),
	('BJ', 'Benín'),
	('BM', 'Islas Bermudas'),
	('BN', 'Brunei Darussalam'),
	('BO', 'Bolivia'),
	('BR', 'Brasil'),
	('BS', 'Bután'),
	('BT', 'Bahamas'),
	('BV', 'Islas Buvet'),
	('BW', 'Botswana'),
	('BY', 'Bielorrusia'),
	('BZ', 'Belice'),
	('CA', 'Canadá'),
	('CC', 'Isla de Cocos'),
	('CD', 'República Democrática del Congo '),
	('CF', 'República Centroafricana'),
	('CG', 'República del Congo'),
	('CH', 'Suiza'),
	('CI', 'Costa de marfil'),
	('CK', 'Islas Cook'),
	('CL', 'Chile'),
	('CM', 'Camerún'),
	('CN', 'China'),
	('CO', 'Colombia'),
	('CR', 'Costa Rica'),
	('CS', 'Checoslovaquia (antiguo país)'),
	('CU', 'Cuba'),
	('CV', 'Cabo Verde'),
	('CX', 'Islas Christmas'),
	('CY', 'Chipre'),
	('CZ', 'República Checa'),
	('DE', 'Alemania'),
	('DJ', 'Djibouti'),
	('DK', 'Dinamarca'),
	('DM', 'Dominica'),
	('DO', 'República Dominicana'),
	('DZ', 'Argelia'),
	('EC', 'Ecuador'),
	('EE', 'Estonia'),
	('EG', 'Egipto'),
	('EH', 'Sáhara Occidental'),
	('ER', 'Eritrea'),
	('ET', 'Etiopía'),
	('FI', 'Finlandia'),
	('FJ', 'Fiji'),
	('FK', 'Islas Malvinas'),
	('FM', 'Micronesia'),
	('FO', 'Islas Feroe'),
	('FR', 'Francia'),
	('GA', 'Gabón'),
	('GD', 'Granada'),
	('GE', 'Georgia'),
	('GF', 'Guyana Francesa'),
	('GG', 'Guernsey'),
	('GH', 'Ghana'),
	('GI', 'Gibraltar'),
	('GL', 'Groenlandia'),
	('GM', 'Gambia'),
	('GN', 'Guinea'),
	('GP', 'Guadalupe'),
	('GQ', 'Guinea Ecuatorial'),
	('GR', 'Grecia'),
	('GS', 'Islas Georgias y Sandwich del Sur'),
	('GT', 'Guatemala'),
	('GU', 'Guam'),
	('GW', 'Guinea-Bissau'),
	('GY', 'Guayana'),
	('HK', 'Hong Kong'),
	('HM', 'Islas Heard y McDonald'),
	('HN', 'Honduras'),
	('HR', 'Croacia'),
	('HT', 'Haití'),
	('HU', 'Hungría'),
	('ID', 'Indonesia'),
	('IE', 'Irlanda'),
	('IL', 'Israel'),
	('IM', 'Isla de Man'),
	('IN', 'India'),
	('IO', 'Territorio británico del Océano Índico'),
	('IQ', 'Iraq'),
	('IR', 'Irán'),
	('IS', 'Islandia'),
	('IT', 'Italia'),
	('JE', 'Jersey'),
	('JM', 'Jamaica'),
	('JO', 'Jordania'),
	('JP', 'Japón'),
	('KE', 'Kenia'),
	('KG', 'Kyrgystán'),
	('KH', 'Camboya'),
	('KI', 'Kiribati'),
	('KM', 'Islas Comores'),
	('KN', 'San Kitts y Nevis'),
	('KP', 'Corea del Norte'),
	('KR', 'Corea del Sur'),
	('KW', 'Kuwait'),
	('KY', 'Islas Caimán'),
	('KZ', 'Kazajistán'),
	('LA', 'Laos'),
	('LB', 'Líbano'),
	('LC', 'Santa Lucía'),
	('LI', 'Liechtenstein'),
	('LK', 'Sri Lanka'),
	('LR', 'Liberia'),
	('LS', 'Lesoto'),
	('LT', 'Lituania'),
	('LU', 'Luxemburgo'),
	('LV', 'Letonia'),
	('LY', 'Libia'),
	('MA', 'Marruecos'),
	('MC', 'Mónaco'),
	('MD', 'Moldavia'),
	('MG', 'Madagascar'),
	('MH', 'Islas Marshall'),
	('MK', 'Macedonia'),
	('ML', 'Mali'),
	('MM', 'Birmania'),
	('MN', 'Mongolia'),
	('MO', 'Macao'),
	('MP', 'Islas Marianas'),
	('MQ', 'Martinica'),
	('MR', 'Mauritania'),
	('MS', 'Montserrat'),
	('MT', 'Malta'),
	('MU', 'Mauricio'),
	('MV', 'Maldivas'),
	('MW', 'Malawi'),
	('MX', 'México'),
	('MY', 'Malasia'),
	('MZ', 'Mozambique'),
	('NA', 'Namibia'),
	('NC', 'Nueva Caledonia'),
	('NE', 'Níger'),
	('NF', 'Islas Norfolk'),
	('NG', 'Nigeria'),
	('NI', 'Nicaragua'),
	('NL', 'Países Bajos'),
	('NO', 'Noruega'),
	('NP', 'Nepal'),
	('NR', 'Nauru'),
	('NT', 'Zona Neutral'),
	('NU', 'Niue'),
	('NZ', 'Nueva Zelanda'),
	('OM', 'Omán'),
	('PA', 'Panamá'),
	('PE', 'Perú'),
	('PF', 'Polinesia Francesa'),
	('PG', 'Papúa Nueva Guinea'),
	('PH', 'Filipinas'),
	('PK', 'Pakistán'),
	('PL', 'Polonia'),
	('PM', 'San Pedro y Miquelón'),
	('PN', 'Pitcairn'),
	('PR', 'Puerto Rico'),
	('PS', 'Territorios Palestinos'),
	('PT', 'Portugal'),
	('PW', 'Palau'),
	('PY', 'Paraguay'),
	('QA', 'Qatar'),
	('RE', 'Isla Reunión'),
	('RO', 'Rumanía'),
	('RU', 'Rusia'),
	('RW', 'Ruanda'),
	('SA', 'Arabia Saudí'),
	('SB', 'Islas Salomón'),
	('SC', 'Islas Seychelles'),
	('SD', 'Sudán'),
	('SE', 'Suecia'),
	('SG', 'Singapur'),
	('SH', 'Santa Helena'),
	('SI', 'Eslovenia'),
	('SJ', 'Islas Svalbard y Jan Mayens'),
	('SK', 'Eslovaquia'),
	('SL', 'Sierra Leona'),
	('SM', 'San Marino'),
	('SN', 'Senegal'),
	('SO', 'Somalia'),
	('SR', 'Surinam'),
	('ST', 'Santo Tomé y Príncipe'),
	('SU', 'URSS'),
	('SV', 'El Salvador'),
	('SY', 'Siria'),
	('SZ', 'Suazilandia'),
	('TC', 'Islas Turks y Caicos'),
	('TD', 'Chad'),
	('TF', 'Tierras Australes y Antárticas Francesas'),
	('TG', 'Togo'),
	('TH', 'Tailandia'),
	('TJ', 'Tayikistán'),
	('TK', 'Tokelau'),
	('TM', 'Turkmenistán'),
	('TN', 'Túnez'),
	('TO', 'Tonga'),
	('TP', 'Timor Oriental'),
	('TR', 'Turquía'),
	('TT', 'Trinidad y Tobago'),
	('TV', 'Tuvalu'),
	('TW', 'Taiwán'),
	('TZ', 'Tanzania'),
	('UA', 'Ucrania'),
	('UG', 'Uganda'),
	('UK', 'Reino Unido'),
	('UM', 'Islas Ultramarinas de Estados Unidos '),
	('US', 'Estados Unidos de América'),
	('UY', 'Uruguay'),
	('UZ', 'Uzbekistán'),
	('VA', 'Vaticano'),
	('VC', 'San Vicente y las Granadinas'),
	('VE', 'Venezuela'),
	('VG', 'Islas Vírgenes Británicas'),
	('VI', 'Islas Vírgenes Americanas'),
	('VN', 'Vietnam'),
	('VU', 'Vanuatu'),
	('WF', 'Islas Wallis y Futuna'),
	('WS', 'Samoa'),
	('YE', 'Yemen'),
	('YT', 'Mayotte'),
	('YU', 'Yugoslavia (antiguo país)'),
	('ZA', 'Sudáfrica'),
	('ZM', 'Zambia'),
	('ZR', 'Zaire (antiguo país)'),
	('ZW', 'Zimbabwe');
/*!40000 ALTER TABLE `paises` ENABLE KEYS */;

-- Volcando estructura para tabla odontosoft.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla odontosoft.password_resets: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
REPLACE INTO `password_resets` (`email`, `token`, `created_at`) VALUES
	('amarcano568@gmail.com', '$2y$10$ZwggspwRvzxF2rUhxTcVI.lJpaK6RzQfuSAImsz4d.ShD7BK05uKy', '2019-09-23 13:40:16');
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Volcando estructura para tabla odontosoft.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastName` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `userName` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '\nUsername\nperfil_usuario\nfemenino\nespecialidadMedica\nselect_sucursal\nidioma\nrut_usuario\nfec_nac_usuario\nfonofijo_usuario\nfonocell_usuario\ndireccion_usuario',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `Empresa` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sucursal` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `perfil` int(11) DEFAULT NULL,
  `sexo` char(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `especialidadMedica` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `idioma` char(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rut_dni` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecNacimiento` date DEFAULT NULL,
  `telefonoFijo` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefonoCelular` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `direccion` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `changePassword` char(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='direccion_usuario';

-- Volcando datos para la tabla odontosoft.users: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
REPLACE INTO `users` (`id`, `name`, `lastName`, `userName`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `Empresa`, `sucursal`, `status`, `perfil`, `sexo`, `especialidadMedica`, `idioma`, `rut_dni`, `fecNacimiento`, `telefonoFijo`, `telefonoCelular`, `direccion`, `changePassword`) VALUES
	(1, 'Alexander J', 'Marcano A', NULL, 'amarcano568@gmail.com', NULL, '$2y$10$WjJFwV7nCQ6nzMWZel.44OLxGBpDa03dsHF1nKM7.jFpLflsiX.3W', '1ocjTYw0SFMFC5yFtG6HsbHkb35CvMc9hrEWnpG2neR284BfPapkF3jbGUh4', '2019-07-30 15:47:32', '2019-07-30 15:47:32', 'DentalCare', '1', 1, 4, 'M', '2', 'ES', '87654321', '1974-09-06', '931288300', '931288300', 'Av. ', NULL),
	(2, 'Luriannys', 'Salazar P.', 'luri', 'luriannys_salazar@hotmail.com', NULL, '$2y$10$HYaq5jTxWxLKvqniu9ebiu4NV5szhbSmtOkSMvcuGS.vA9LYIxxp2', NULL, '2019-09-23 16:39:17', '2019-09-23 16:39:17', 'DentalCare', '1,2', 1, 4, 'F', '2,3', 'ES', '12345678', '1981-10-31', '973253612', '3333', 'Prueba', 'S'),
	(4, 'Adrian', 'Marcano C', 'adrian', 'adrian@hotmail.com', NULL, '$2y$10$02mKkCRSFZkhdjZybkEpB.Madh3i9VrfOArdf7cPHNEs/Qllq8QNK', NULL, '2019-09-23 20:28:34', '2019-09-23 20:28:34', 'DentalCare', '2', 1, 2, 'M', '1', 'ES', '2333333', '2002-09-17', '973253612', '3333', 'wwwww', 'S'),
	(5, 'Alexandra de los Angeles', 'Marcano Salazar', 'pastorita', 'alexandra_pastorita@gmail.com', NULL, '$2y$10$73TQbhuVvhZe9AkNmbngKujtdMD566PfQnqfQ31ZC5KZa0SRaaQJ6', NULL, '2019-09-24 16:24:40', '2019-09-24 16:24:40', 'DentalCare', '1,2', 1, 2, 'F', '5,7', 'ES', '12345678', '2012-10-01', '973253612', '3333', NULL, 'S');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
