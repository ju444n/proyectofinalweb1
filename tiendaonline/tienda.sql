-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-11-2022 a las 00:05:12
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tienda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `descripcion` longtext NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `especificaciones` longtext NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `activo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `precio`, `especificaciones`, `id_categoria`, `activo`) VALUES
(1, 'ASUS TUF Gaming A15 FA507RM-HN003 AMD Ryzen 7 6800H/16GB/1TB SSD/RTX 3060/15.6\"', 'El nuevo chasis TUF Gaming de 2022 es un 4,5% más pequeño que los modelos del año pasado. El logotipo TUF también se ha renovado con versiones en relieve y esculpidas con láser. A pesar de ser más pequeño, el nuevo TUF Gaming A15 de 2022 sigue albergando un gran touchpad con acentos inspirados en el anime y cuatro indicadores LED. ', '1189.00', '<ul>\r\n<li>Procesador: AMD Ryzen 7 6800H (8 Núcleos, 20MB Caché, hasta 4.70GHz, 64-bit)</li>\r\n<li>Memoria RAM: 16 GB DDR5 4800 MHz (2x8GB); Ampliable hasta 32GB (2 Slots)</li>\r\n<li>Almacenamiento 1 TB SSD M.2 NVMe PCIe 3.0</li>\r\n<li>Unidad óptica No</li>\r\n<li>Pantalla: 15,6\" - 39,62 cm, FHD (1920 x 1080) 16:9, Anti reflejo, sRGB62.5%, Adobe47.34%, Tasa de refresco 144 Hz, Nivel IPS, Adaptive-Sync, MUX Switch + Optimus</li>\r\n<li>Controlador gráfico: NVIDIA® GeForce RTX™ 3060 Laptop GPU, 1752MHz* at 140W (1702MHz Boost Clock+50MHz OC,115W+25W Dynamic Boost), GDDR6 de 6 GB</li>\r\n<li>Conectividad: Ethernet LAN 10/100/1000 Mbps y Wi-Fi 6( 802.11ax) 2x2 + Bluetooth 5.2</li>\r\n<li>Webcam: HD 720p</li>\r\n<li>Audio: 2 x Altavoces / Micrófono incorporado / Dolby Atmos / Cancelación de ruido por IA / Certificación Hi-Res</li>\r\n<li>Batería: 90Wh, 4 Celdas, Iones de Litio</li>\r\n</ul>\r\n', 1, 1),
(2, 'Asus Dual GeForce RTX 3060 OC Edition V2 12GB GDDR6', 'RTX.  IT’S ON. Disfruta de los mayores éxitos de ventas de hoy como nunca antes con la fidelidad visual del trazado de rayos en tiempo real y el rendimiento definitivo de DLSS con tecnología de IA.\r\n\r\nLA VICTORIA SE MIDE EN MILISEGUNDOS: NVIDIA Reflex ofrece la máxima ventaja competitiva. La latencia más baja. La mejor capacidad de respuesta. Gracias a las GPU GeForce RTX serie 30 y los monitores NVIDIA\r\nTU JUEGO CREATIVO:  Lleva tus proyectos creativos a un nuevo nivel con las GPU GeForce RTX serie 30. Ofrece aceleración por IA en las mejores aplicaciones creativas. Con el soporte de la plataforma NVIDIA Studio de controladores dedicados y herramientas exclusivas. Y creado para obtener resultados en un tiempo récord. Tanto si estás renderizando escenas en 3D complejas, editando vídeo de 8K o retransmitiendo con la mejor codificación y calidad de imagen, las GPU GeForce RTX te ofrecen el rendimiento necesario para tus mejores creaciones.', '390.00', '<ul>\r\n<li>Procesador gráfico: GeForce RTX 3060</li>\r\n<li>Aumento de la velocidad de reloj del procesador: 1837 MHz</li>\r\n<li>Máxima resolución: 7680 x 4320 Pixeles</li>\r\n<li>Máximas pantallas por tarjeta de video: 4</li>\r\n<li>Capacidad memoria de adaptador gráfico: 12 GB</li>\r\n<li>Ancho de datos: 192 bit</li>\r\n<li>Velocidad de transferencia de datos: 15 Gbit/s</li>\r\n<li>Número de puertos HDMI: 1</li>\r\n<li>Versión OpenGL: 4.6</li>\r\n<li>Número de ranuras: 2</li>\r\n</ul>', 1, 1),
(3, 'ASUS TUF Gaming VG249Q1A 23.8\" LED IPS FullHD 165Hz FreeSync Premium', 'TUF Gaming VG249Q1A es una pantalla IPS Full HD (1920 x 1080) de 23,8 pulgadas con una frecuencia de actualización ultrarrápida de 165Hz. Diseñado para jugadores y otros que buscan un juego inmersivo, ofrece algunas especificaciones serias. Pero hay más ... Su función exclusiva ELMB presenta un tiempo de respuesta MPRT de 1 ms y tecnología Adaptive-Sync (FreeSync ™ Premium), para un juego extremadamente fluido sin desgarros ni tartamudeos.\r\n\r\n', '155.00', '<ul>\r\n<li>Diagonal de la pantalla: 60,5 cm (23.8\")</li>\r\n<li>Tipo HD: Full HD</li>\r\n<li>Tecnología de visualización: LED</li>\r\n<li>Resolución de la pantalla: 1920 x 1080 Pixeles</li>\r\n<li>Formatos gráficos soportados: 1920 x 1080 (HD 1080)</li>\r\n<li>Relación de aspecto: 16:9</li>\r\n<li>Tipo de pantalla: IPS</li>\r\n<li>Tamaño de pixel: 0,2745 x 0,2745 mm</li>\r\n<li>Intervalo de escaneado vertical: 48 - 165 Hz</li>\r\n<li>Tamaño visible, horizontal: 52,7 cm</li>\r\n<li>Tamaño visible, vertical: 29,6 cm</li>\r\n</ul>', 1, 1),
(4, 'Asus PRIME B550-PLUS', 'La serie ASUS Prime está diseñada para aprovechar todo el rendimiento potencial de los procesadores AMD Ryzen de 3.ª Gen. Equipadas con un potente diseño de alimentación, soluciones de refrigeración completas y opciones de ajuste inteligentes, las placas base de la serie Prime B550 incluyen ajustes de rendimiento muy intuitivos vía software y firmware.', '120.00', '<ul>\r\n<li>CPU integrada: AMD AM4 Socket 3rd Gen AMD Ryzen™ Processors *</li>\r\n<li>Memoria: 4 x Memoria DIMM, Max. 128GB, DDR4</li>\r\n<li>Arquitectura de memoria Dual Channel</li>\r\n<li>Grafica: 1 x HDMI 2.1(4K@60HZ)</li>\r\n<li>Compatible Multi-GPU</li>\r\n<li>3rd Gen AMD Ryzen™ Processors</li>\r\n<li>Total supports 2 x M.2 slots and 6 x SATA 6Gb/s ports</li>\r\n<li>3rd Gen AMD Ryzen™ Processors :</li>\r\n<li>6 x puertos SATA 6Gb/s, *2</li>\r\n<li>Realtek ALC887 7.1 canales CODEC de audio de alta definición</li>\r\n</ul>', 1, 1),
(5, 'Tempest Apocalypse Combo Gaming Teclado + Ratón + Auriculares + Alfombra', 'Tempest, una de las marcas más punteras y con mejor calidad precio del mercado una vez más lo vuelve a hacer, el pack perfecto para todos aquellos que quieran iniciarse en el gaming, dar a su pc un look más gamer o mejorar parte de los elementos de los que ya disponen. Para ello han seleccionado 4 productos de excelente calidad con los cuales dotar a tu pc de luz, color y una experiencia de juego a la vanguardia de gaming actual.  No lo pienses más, tus partidas no volverán a ser iguales.', '34.00', '<ul>\r\nTECLADO\r\n<li>Ultra silencioso: Pulsación Silenciosa para un bajo ruido de escritura</li>\r\n<li>Laser Keys: Teclas marcadas a láser, resistentes al desgaste.</li>\r\n<li>Iluminación: 3 Colores</li>\r\nRATON\r\n<li>Resolución ajustable:  1000 - 4000dpi</li>\r\n<li>Tasa de Muestreo: 250Hz</li>\r\n<li>Número de teclas: 6 Botones</li>\r\n<li>Velocidad Máxima: 30 IPS</li>\r\nAURICULARES\r\n<li>Frecuencia de respuesta Auriculares: 20Hz - 20,000Hz</li>\r\n<li>Frecuencia de respuesta Microfono : 30Hz - 16,000Hz</li>\r\n<li>Conexión: 2* 3.5mm stereo mini jack </li>\r\n</ul>', 1, 1),
(6, 'Forgeon Perdition RGB Ratón Gaming 16.000 DPI Negro', 'Dentro de la gama de productos de Forgeon traemos el nuevo mouse Forgeon Perdition RGB. Un ratón con un diseño atractivo y preparado para las más altas exigencias del mundo gaming. Incluye accesorios adicionales y una conectividad con USB 2.0 garantizando que la velocidad y la precisión estén de tu parte ¡Adquiere ahora este ratón y comienza a disfrutar!', '40.00', '<ul>\r\n<li>Tamaño del producto: W69 x L 125 x H 40mm</li>\r\n<li>Sensor: PMW3389</li>\r\n<li>Resolución del sensor: 500-1000-1500- 2000-4000-8000-16000 CPI</li>\r\n<li>Tipo de LED: Botón RGB</li>\r\n<li>Tasa de sondeo: de 500 a 1000 Hz</li>\r\n<li>Interruptor: Omron 20 min</li>\r\n<li>Codificador: TTC</li>\r\n<li>Conector: USB 2.0</li>\r\n<li>Cable: 1,8 m con filtro de ferrita</li>\r\n<li>Velocidad máxima: 400 IPS</li>\r\n</ul>\r\n', 1, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
