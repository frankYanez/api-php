<?php
require_once 'libs/config.php';
abstract class Model
{
    protected $db;


    function __construct()
    {
        $this->db = new PDO('mysql:host=' . MYSQL_HOST . ';dbname=' . MYSQL_DB . ';charset=utf8', MYSQL_USER, MYSQL_PASS);
        $this->deploy();
    }

    function deploy()
    {
        // Chequear si hay tablas
        $query = $this->db->query('SHOW TABLES');
        $tables = $query->fetchAll(); // Nos devuelve todas las tablas de la db 
        
        /* //EN CASO DE QUE NO HAYA BASE DE DATOS, CREA UNA CON LOS SIGUIENTES VALORES:
        if(count($tables)==0){
            $sql =<<<END
                
                -- Estructura de tabla para la tabla `desarrollador`
                --
                
                CREATE TABLE `desarrollador` (
                `id` int(11) NOT NULL,
                `nombre` varchar(40) NOT NULL,
                `sede` varchar(100) NOT NULL,
                `año_fundacion` int(4) NOT NULL,
                `propietario` varchar(100) NOT NULL
                ) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
                
                --
                -- Volcado de datos para la tabla `desarrollador`
                --
                
                INSERT INTO `desarrollador` (`id`, `nombre`, `sede`, `año_fundacion`, `propietario`) VALUES
                (1, 'Blizzard Entertainment', 'Irvine, California, EEUU', 1994, 'Activision Blizzard'),
                (2, 'Ubisoft Entertainment S. A.', 'Montreuil-Sous-Bois, Francia', 1986, 'Familia Guillemot'),
                (3, 'Gameloft SE', 'Paris, Francia', 1999, 'Vivendi'),
                (4, 'Tencent Games', 'Shenzhen, Guangdong, China', 2003, 'Tencent'),
                (5, 'Riot Games Inc', 'Los Ángeles, California, EEUU', 2006, 'Tencent Holdings'),
                (6, 'Nintendo Co., Ltd.', 'Kioto, Japón', 1889, 'Capital Group Companies, Autocartera y Banco de Kioto\r\n');
                
                -- --------------------------------------------------------
                
                --
                -- Estructura de tabla para la tabla `juego`
                --
                
                CREATE TABLE `juego` (
                `id` int(11) NOT NULL,
                `nombre` varchar(40) NOT NULL,
                `genero` varchar(25) NOT NULL,
                `desarrollador_id` int(11) NOT NULL,
                `año_lanzamiento` year(4) NOT NULL
                ) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
                
                --
                -- Volcado de datos para la tabla `juego`
                --
                
                INSERT INTO `juego` (`id`, `nombre`, `genero`, `desarrollador_id`, `año_lanzamiento`) VALUES
                (1, 'Starcraft', 'Estrategia', 1, '1998'),
                (2, 'Assassin\'s Creed', 'Aventura', 2, '2007'),
                (3, 'Tony Hawk\'s Pro Skater 1 + 2', 'Simulacion', 1, '2020'),
                (4, 'Call of Duty: WWII', 'Disparos', 1, '2017'),
                (5, 'Crash Bandicoot 4: It\'s About Time', 'Pelea', 1, '2021'),
                (6, 'Spyro Reignited Trilogy', 'Aventura', 1, '2018'),
                (7, 'Super Mario Maker 2', 'Desplazamiento Lateral', 6, '2019'),
                (8, 'Super Mario Bros. Wonder', 'Accion', 6, '2023'),
                (9, 'The Legend of Zelda: Tears of the Kingdo', 'Accion', 6, '2023'),
                (10, 'Pokémon Escarlata', 'Rol', 6, '2022'),
                (11, 'League of Legends	', 'Moba', 5, '2009'),
                (12, 'Teamfight Tactics	', 'AutoBattler', 5, '2019'),
                (13, 'Legends of Runeterra	', 'Cartas', 5, '2020'),
                (14, 'Moonlight Blade', 'MMORPG', 4, '2007'),
                (15, 'Iron Knight', 'MMORPG', 4, '2007'),
                (16, 'QQ Flying Car', 'Casual', 4, '2011'),
                (17, 'PUBG MOBILE', 'Battle Royale', 4, '2018'),
                (18, 'Far Cry 5', 'Disparos', 2, '2018'),
                (19, 'Anno 1880', 'Estrategia', 2, '2019'),
                (20, 'Rayman', 'Desplazamiento Lateral', 2, '1995'),
                (21, 'The Crew 2', 'Mundo Abierto', 2, '2018');
                
                -- --------------------------------------------------------
                
                --
                -- Estructura de tabla para la tabla `usuario`
                --
                
                CREATE TABLE `usuario` (
                `id` int(11) NOT NULL,
                `user` varchar(55) NOT NULL,
                `password` varchar(255) NOT NULL,
                `id_rol` varchar(10) DEFAULT NULL
                ) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
                
                --
                -- Volcado de datos para la tabla `usuario`
                --
                
                INSERT INTO `usuario` (`id`, `user`, `password`, `id_rol`) VALUES
                (1, 'webadmin', '$2y$10$TIt9L4qxMWH0UgHiIiFabOkKyBbZCyxD6d1FZOxZPCXWRicIy4iJO', NULL);
                
                --
                -- Índices para tablas volcadas
                --
                
                --
                -- Indices de la tabla `desarrollador`
                --
                ALTER TABLE `desarrollador`
                ADD PRIMARY KEY (`id`);
                
                --
                -- Indices de la tabla `juego`
                --
                ALTER TABLE `juego`
                ADD PRIMARY KEY (`id`),
                ADD KEY `desarrollador_id` (`desarrollador_id`);
                
                --
                -- Indices de la tabla `usuario`
                --
                ALTER TABLE `usuario`
                ADD PRIMARY KEY (`id`);
                
                --
                -- AUTO_INCREMENT de las tablas volcadas
                --
                
                --
                -- AUTO_INCREMENT de la tabla `desarrollador`
                --
                ALTER TABLE `desarrollador`
                MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
                
                --
                -- AUTO_INCREMENT de la tabla `juego`
                --
                ALTER TABLE `juego`
                MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
                
                --
                -- AUTO_INCREMENT de la tabla `usuario`
                --
                ALTER TABLE `usuario`
                MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
                
                --
                -- Restricciones para tablas volcadas
                --
                
                --
                -- Filtros para la tabla `juego`
                --
                ALTER TABLE `juego`
                ADD CONSTRAINT `juego_ibfk_1` FOREIGN KEY (`desarrollador_id`) REFERENCES `desarrollador` (`id`);
                COMMIT;

            END;
            $this->db->query($sql);
        }*/

    }
}
