--
-- Estrutura da tabela `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `permissions` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `groups`
--

INSERT INTO `groups` (`id`, `name`, `permissions`) VALUES
(1, 'Usuário', 'a:5:{s:5:"index";s:1:"1";s:4:"view";s:1:"1";s:3:"add";s:1:"0";s:4:"edit";s:1:"0";s:6:"delete";s:1:"0";}'),
(2, 'Administrador', 'a:5:{s:5:"index";s:1:"1";s:4:"view";s:1:"1";s:3:"add";s:1:"1";s:4:"edit";s:1:"1";s:6:"delete";s:1:"0";}');

-- -------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` char(1) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `password_hint` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_users_groups_idx` (`group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `group_id`, `name`, `gender`, `birthday`, `profile_image`, `email`, `password`, `password_hint`, `status`, `created`, `modified`) VALUES
(1, 1, 'User User', NULL, NULL, NULL, 'user@mail.com', 'db72bf8e3a94a20850235ad46d66e81e95aef5b9', '', 1, '2015-03-14 23:49:11', '2015-03-14 23:49:11');
