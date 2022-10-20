#
# KIA Database Dump
# MODX Version:1.4.20
# 
# Host: 
# Generation Time: 20-10-2022 18:07:39
# Server version: 8.0.30
# PHP Version: 7.4.30
# Database: `modx_demo`
# Description: 
#

# --------------------------------------------------------

SET @old_sql_mode := @@sql_mode;
SET @new_sql_mode := @old_sql_mode;
SET @new_sql_mode := TRIM(BOTH ',' FROM REPLACE(CONCAT(',',@new_sql_mode,','),',NO_ZERO_DATE,'  ,','));
SET @new_sql_mode := TRIM(BOTH ',' FROM REPLACE(CONCAT(',',@new_sql_mode,','),',NO_ZERO_IN_DATE,',','));
SET @@sql_mode := @new_sql_mode ;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;


# --------------------------------------------------------



# --------------------------------------------------------

#
# Table structure for table `dy5r_active_user_locks`
#

DROP TABLE IF EXISTS `dy5r_active_user_locks`;
CREATE TABLE `dy5r_active_user_locks` (
  `id` int NOT NULL AUTO_INCREMENT,
  `sid` varchar(32) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `internalKey` int NOT NULL DEFAULT '0',
  `elementType` int NOT NULL DEFAULT '0',
  `elementId` int NOT NULL DEFAULT '0',
  `lasthit` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `ix_element_id` (`elementType`,`elementId`,`sid`)
) ENGINE=MyISAM AUTO_INCREMENT=743 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Contains data about locked elements.';



# --------------------------------------------------------

#
# Table structure for table `dy5r_active_user_sessions`
#

DROP TABLE IF EXISTS `dy5r_active_user_sessions`;
CREATE TABLE `dy5r_active_user_sessions` (
  `sid` varchar(32) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `internalKey` int NOT NULL DEFAULT '0',
  `lasthit` int NOT NULL DEFAULT '0',
  `ip` varchar(50) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`sid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Contains data about valid user sessions.';



# --------------------------------------------------------

#
# Table structure for table `dy5r_active_users`
#

DROP TABLE IF EXISTS `dy5r_active_users`;
CREATE TABLE `dy5r_active_users` (
  `sid` varchar(32) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `internalKey` int NOT NULL DEFAULT '0',
  `username` varchar(50) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `lasthit` int NOT NULL DEFAULT '0',
  `action` varchar(10) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `id` int DEFAULT NULL,
  PRIMARY KEY (`sid`,`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Contains data about last user action.';



# --------------------------------------------------------

#
# Table structure for table `dy5r_categories`
#

DROP TABLE IF EXISTS `dy5r_categories`;
CREATE TABLE `dy5r_categories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `category` varchar(45) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `rank` int unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Categories to be used snippets,tv,chunks, etc';



# --------------------------------------------------------

#
# Table structure for table `dy5r_document_groups`
#

DROP TABLE IF EXISTS `dy5r_document_groups`;
CREATE TABLE `dy5r_document_groups` (
  `id` int NOT NULL AUTO_INCREMENT,
  `document_group` int NOT NULL DEFAULT '0',
  `document` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `ix_dg_id` (`document_group`,`document`),
  KEY `document` (`document`),
  KEY `document_group` (`document_group`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Contains data used for access permissions.';



# --------------------------------------------------------

#
# Table structure for table `dy5r_documentgroup_names`
#

DROP TABLE IF EXISTS `dy5r_documentgroup_names`;
CREATE TABLE `dy5r_documentgroup_names` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(245) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `private_memgroup` tinyint DEFAULT '0' COMMENT 'determine whether the document group is private to manager users',
  `private_webgroup` tinyint DEFAULT '0' COMMENT 'determines whether the document is private to web users',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Contains data used for access permissions.';



# --------------------------------------------------------

#
# Table structure for table `dy5r_event_log`
#

DROP TABLE IF EXISTS `dy5r_event_log`;
CREATE TABLE `dy5r_event_log` (
  `id` int NOT NULL AUTO_INCREMENT,
  `eventid` int DEFAULT '0',
  `createdon` int NOT NULL DEFAULT '0',
  `type` tinyint NOT NULL DEFAULT '1' COMMENT '1- information, 2 - warning, 3- error',
  `user` int NOT NULL DEFAULT '0' COMMENT 'link to user table',
  `usertype` tinyint NOT NULL DEFAULT '0' COMMENT '0 - manager, 1 - web',
  `source` varchar(50) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `description` text COLLATE utf8mb4_general_ci,
  PRIMARY KEY (`id`),
  KEY `user` (`user`)
) ENGINE=MyISAM AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Stores event and error logs';



# --------------------------------------------------------

#
# Table structure for table `dy5r_manager_log`
#

DROP TABLE IF EXISTS `dy5r_manager_log`;
CREATE TABLE `dy5r_manager_log` (
  `id` int NOT NULL AUTO_INCREMENT,
  `timestamp` int NOT NULL DEFAULT '0',
  `internalKey` int NOT NULL DEFAULT '0',
  `username` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `action` int NOT NULL DEFAULT '0',
  `itemid` varchar(10) COLLATE utf8mb4_general_ci DEFAULT '0',
  `itemname` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `message` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `ip` varchar(46) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `useragent` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1774 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Contains a record of user interaction.';



# --------------------------------------------------------

#
# Table structure for table `dy5r_manager_users`
#

DROP TABLE IF EXISTS `dy5r_manager_users`;
CREATE TABLE `dy5r_manager_users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(100) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `password` varchar(100) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Contains login information for backend users.';



# --------------------------------------------------------

#
# Table structure for table `dy5r_member_groups`
#

DROP TABLE IF EXISTS `dy5r_member_groups`;
CREATE TABLE `dy5r_member_groups` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_group` int NOT NULL DEFAULT '0',
  `member` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `ix_group_member` (`user_group`,`member`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Contains data used for access permissions.';



# --------------------------------------------------------

#
# Table structure for table `dy5r_membergroup_access`
#

DROP TABLE IF EXISTS `dy5r_membergroup_access`;
CREATE TABLE `dy5r_membergroup_access` (
  `id` int NOT NULL AUTO_INCREMENT,
  `membergroup` int NOT NULL DEFAULT '0',
  `documentgroup` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Contains data used for access permissions.';



# --------------------------------------------------------

#
# Table structure for table `dy5r_membergroup_names`
#

DROP TABLE IF EXISTS `dy5r_membergroup_names`;
CREATE TABLE `dy5r_membergroup_names` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(245) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Contains data used for access permissions.';



# --------------------------------------------------------

#
# Table structure for table `dy5r_site_content`
#

DROP TABLE IF EXISTS `dy5r_site_content`;
CREATE TABLE `dy5r_site_content` (
  `id` int NOT NULL AUTO_INCREMENT,
  `type` varchar(20) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'document',
  `contentType` varchar(50) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'text/html',
  `pagetitle` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `longtitle` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `description` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `alias` varchar(245) COLLATE utf8mb4_general_ci DEFAULT '',
  `link_attributes` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT 'Link attriubtes',
  `published` int NOT NULL DEFAULT '0',
  `pub_date` int NOT NULL DEFAULT '0',
  `unpub_date` int NOT NULL DEFAULT '0',
  `parent` int NOT NULL DEFAULT '0',
  `isfolder` int NOT NULL DEFAULT '0',
  `introtext` text COLLATE utf8mb4_general_ci COMMENT 'Used to provide quick summary of the document',
  `content` mediumtext COLLATE utf8mb4_general_ci,
  `richtext` tinyint(1) NOT NULL DEFAULT '1',
  `template` int NOT NULL DEFAULT '0',
  `menuindex` int NOT NULL DEFAULT '0',
  `searchable` int NOT NULL DEFAULT '1',
  `cacheable` int NOT NULL DEFAULT '1',
  `createdby` int NOT NULL DEFAULT '0',
  `createdon` int NOT NULL DEFAULT '0',
  `editedby` int NOT NULL DEFAULT '0',
  `editedon` int NOT NULL DEFAULT '0',
  `deleted` int NOT NULL DEFAULT '0',
  `deletedon` int NOT NULL DEFAULT '0',
  `deletedby` int NOT NULL DEFAULT '0',
  `publishedon` int NOT NULL DEFAULT '0' COMMENT 'Date the document was published',
  `publishedby` int NOT NULL DEFAULT '0' COMMENT 'ID of user who published the document',
  `menutitle` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT 'Menu title',
  `donthit` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Disable page hit count',
  `privateweb` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Private web document',
  `privatemgr` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Private manager document',
  `content_dispo` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0-inline, 1-attachment',
  `hidemenu` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Hide document from menu',
  `alias_visible` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `parent` (`parent`),
  KEY `aliasidx` (`alias`),
  KEY `typeidx` (`type`),
  FULLTEXT KEY `content_ft_idx` (`pagetitle`,`description`,`content`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Contains the site document tree.';



# --------------------------------------------------------

#
# Table structure for table `dy5r_site_htmlsnippets`
#

DROP TABLE IF EXISTS `dy5r_site_htmlsnippets`;
CREATE TABLE `dy5r_site_htmlsnippets` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `description` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Chunk',
  `editor_type` int NOT NULL DEFAULT '0' COMMENT '0-plain text,1-rich text,2-code editor',
  `editor_name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'none',
  `category` int NOT NULL DEFAULT '0' COMMENT 'category id',
  `cache_type` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Cache option',
  `snippet` mediumtext COLLATE utf8mb4_general_ci,
  `locked` tinyint NOT NULL DEFAULT '0',
  `createdon` int NOT NULL DEFAULT '0',
  `editedon` int NOT NULL DEFAULT '0',
  `disabled` tinyint NOT NULL DEFAULT '0' COMMENT 'Disables the snippet',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Contains the site chunks.';



# --------------------------------------------------------

#
# Table structure for table `dy5r_site_module_access`
#

DROP TABLE IF EXISTS `dy5r_site_module_access`;
CREATE TABLE `dy5r_site_module_access` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `module` int NOT NULL DEFAULT '0',
  `usergroup` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Module users group access permission';



# --------------------------------------------------------

#
# Table structure for table `dy5r_site_module_depobj`
#

DROP TABLE IF EXISTS `dy5r_site_module_depobj`;
CREATE TABLE `dy5r_site_module_depobj` (
  `id` int NOT NULL AUTO_INCREMENT,
  `module` int NOT NULL DEFAULT '0',
  `resource` int NOT NULL DEFAULT '0',
  `type` int NOT NULL DEFAULT '0' COMMENT '10-chunks, 20-docs, 30-plugins, 40-snips, 50-tpls, 60-tvs',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Module Dependencies';



# --------------------------------------------------------

#
# Table structure for table `dy5r_site_modules`
#

DROP TABLE IF EXISTS `dy5r_site_modules`;
CREATE TABLE `dy5r_site_modules` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `description` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `editor_type` int NOT NULL DEFAULT '0' COMMENT '0-plain text,1-rich text,2-code editor',
  `disabled` tinyint NOT NULL DEFAULT '0',
  `category` int NOT NULL DEFAULT '0' COMMENT 'category id',
  `wrap` tinyint NOT NULL DEFAULT '0',
  `locked` tinyint NOT NULL DEFAULT '0',
  `icon` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT 'url to module icon',
  `enable_resource` tinyint NOT NULL DEFAULT '0' COMMENT 'enables the resource file feature',
  `resourcefile` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT 'a physical link to a resource file',
  `createdon` int NOT NULL DEFAULT '0',
  `editedon` int NOT NULL DEFAULT '0',
  `guid` varchar(32) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT 'globally unique identifier',
  `enable_sharedparams` tinyint NOT NULL DEFAULT '0',
  `properties` text COLLATE utf8mb4_general_ci,
  `modulecode` mediumtext COLLATE utf8mb4_general_ci COMMENT 'module boot up code',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Site Modules';



# --------------------------------------------------------

#
# Table structure for table `dy5r_site_plugin_events`
#

DROP TABLE IF EXISTS `dy5r_site_plugin_events`;
CREATE TABLE `dy5r_site_plugin_events` (
  `pluginid` int NOT NULL,
  `evtid` int NOT NULL DEFAULT '0',
  `priority` int NOT NULL DEFAULT '0' COMMENT 'determines plugin run order',
  PRIMARY KEY (`pluginid`,`evtid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Links to system events';



# --------------------------------------------------------

#
# Table structure for table `dy5r_site_plugins`
#

DROP TABLE IF EXISTS `dy5r_site_plugins`;
CREATE TABLE `dy5r_site_plugins` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `description` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Plugin',
  `editor_type` int NOT NULL DEFAULT '0' COMMENT '0-plain text,1-rich text,2-code editor',
  `category` int NOT NULL DEFAULT '0' COMMENT 'category id',
  `cache_type` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Cache option',
  `plugincode` mediumtext COLLATE utf8mb4_general_ci,
  `locked` tinyint NOT NULL DEFAULT '0',
  `properties` text COLLATE utf8mb4_general_ci COMMENT 'Default Properties',
  `disabled` tinyint NOT NULL DEFAULT '0' COMMENT 'Disables the plugin',
  `moduleguid` varchar(32) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT 'GUID of module from which to import shared parameters',
  `createdon` int NOT NULL DEFAULT '0',
  `editedon` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Contains the site plugins.';



# --------------------------------------------------------

#
# Table structure for table `dy5r_site_snippets`
#

DROP TABLE IF EXISTS `dy5r_site_snippets`;
CREATE TABLE `dy5r_site_snippets` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `description` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Snippet',
  `editor_type` int NOT NULL DEFAULT '0' COMMENT '0-plain text,1-rich text,2-code editor',
  `category` int NOT NULL DEFAULT '0' COMMENT 'category id',
  `cache_type` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Cache option',
  `snippet` mediumtext COLLATE utf8mb4_general_ci,
  `locked` tinyint NOT NULL DEFAULT '0',
  `properties` text COLLATE utf8mb4_general_ci COMMENT 'Default Properties',
  `moduleguid` varchar(32) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT 'GUID of module from which to import shared parameters',
  `createdon` int NOT NULL DEFAULT '0',
  `editedon` int NOT NULL DEFAULT '0',
  `disabled` tinyint NOT NULL DEFAULT '0' COMMENT 'Disables the snippet',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Contains the site snippets.';



# --------------------------------------------------------

#
# Table structure for table `dy5r_site_templates`
#

DROP TABLE IF EXISTS `dy5r_site_templates`;
CREATE TABLE `dy5r_site_templates` (
  `id` int NOT NULL AUTO_INCREMENT,
  `templatename` varchar(100) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `templatealias` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Template',
  `editor_type` int NOT NULL DEFAULT '0' COMMENT '0-plain text,1-rich text,2-code editor',
  `category` int NOT NULL DEFAULT '0' COMMENT 'category id',
  `icon` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT 'url to icon file',
  `template_type` int NOT NULL DEFAULT '0' COMMENT '0-page,1-content',
  `content` mediumtext COLLATE utf8mb4_general_ci,
  `locked` tinyint NOT NULL DEFAULT '0',
  `selectable` tinyint NOT NULL DEFAULT '1',
  `createdon` int NOT NULL DEFAULT '0',
  `editedon` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Contains the site templates.';



# --------------------------------------------------------

#
# Table structure for table `dy5r_site_tmplvar_access`
#

DROP TABLE IF EXISTS `dy5r_site_tmplvar_access`;
CREATE TABLE `dy5r_site_tmplvar_access` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tmplvarid` int NOT NULL DEFAULT '0',
  `documentgroup` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Contains data used for template variable access permissions.';



# --------------------------------------------------------

#
# Table structure for table `dy5r_site_tmplvar_contentvalues`
#

DROP TABLE IF EXISTS `dy5r_site_tmplvar_contentvalues`;
CREATE TABLE `dy5r_site_tmplvar_contentvalues` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tmplvarid` int NOT NULL DEFAULT '0' COMMENT 'Template Variable id',
  `contentid` int NOT NULL DEFAULT '0' COMMENT 'Site Content Id',
  `value` mediumtext COLLATE utf8mb4_general_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ix_tvid_contentid` (`tmplvarid`,`contentid`),
  KEY `idx_tmplvarid` (`tmplvarid`),
  KEY `idx_id` (`contentid`),
  FULLTEXT KEY `value_ft_idx` (`value`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Site Template Variables Content Values Link Table';



# --------------------------------------------------------

#
# Table structure for table `dy5r_site_tmplvar_templates`
#

DROP TABLE IF EXISTS `dy5r_site_tmplvar_templates`;
CREATE TABLE `dy5r_site_tmplvar_templates` (
  `tmplvarid` int NOT NULL DEFAULT '0' COMMENT 'Template Variable id',
  `templateid` int NOT NULL DEFAULT '0',
  `rank` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`tmplvarid`,`templateid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Site Template Variables Templates Link Table';



# --------------------------------------------------------

#
# Table structure for table `dy5r_site_tmplvars`
#

DROP TABLE IF EXISTS `dy5r_site_tmplvars`;
CREATE TABLE `dy5r_site_tmplvars` (
  `id` int NOT NULL AUTO_INCREMENT,
  `type` varchar(50) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `caption` varchar(80) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `description` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `editor_type` int NOT NULL DEFAULT '0' COMMENT '0-plain text,1-rich text,2-code editor',
  `category` int NOT NULL DEFAULT '0' COMMENT 'category id',
  `locked` tinyint NOT NULL DEFAULT '0',
  `elements` text COLLATE utf8mb4_general_ci,
  `rank` int NOT NULL DEFAULT '0',
  `display` varchar(20) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT 'Display Control',
  `display_params` text COLLATE utf8mb4_general_ci COMMENT 'Display Control Properties',
  `default_text` text COLLATE utf8mb4_general_ci,
  `createdon` int NOT NULL DEFAULT '0',
  `editedon` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `indx_rank` (`rank`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Site Template Variables';



# --------------------------------------------------------

#
# Table structure for table `dy5r_system_eventnames`
#

DROP TABLE IF EXISTS `dy5r_system_eventnames`;
CREATE TABLE `dy5r_system_eventnames` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `service` tinyint NOT NULL DEFAULT '0' COMMENT 'System Service number',
  `groupname` varchar(20) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=147 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='System Event Names.';



# --------------------------------------------------------

#
# Table structure for table `dy5r_system_settings`
#

DROP TABLE IF EXISTS `dy5r_system_settings`;
CREATE TABLE `dy5r_system_settings` (
  `setting_name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `setting_value` text COLLATE utf8mb4_general_ci,
  PRIMARY KEY (`setting_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Contains Content Manager settings.';



# --------------------------------------------------------

#
# Table structure for table `dy5r_user_attributes`
#

DROP TABLE IF EXISTS `dy5r_user_attributes`;
CREATE TABLE `dy5r_user_attributes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `internalKey` int NOT NULL DEFAULT '0',
  `fullname` varchar(100) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `role` int NOT NULL DEFAULT '0',
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `phone` varchar(100) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `mobilephone` varchar(100) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `blocked` int NOT NULL DEFAULT '0',
  `blockeduntil` int NOT NULL DEFAULT '0',
  `blockedafter` int NOT NULL DEFAULT '0',
  `logincount` int NOT NULL DEFAULT '0',
  `lastlogin` int NOT NULL DEFAULT '0',
  `thislogin` int NOT NULL DEFAULT '0',
  `failedlogincount` int NOT NULL DEFAULT '0',
  `sessionid` varchar(100) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `dob` int NOT NULL DEFAULT '0',
  `gender` int NOT NULL DEFAULT '0' COMMENT '0 - unknown, 1 - Male 2 - female',
  `country` varchar(5) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `street` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `city` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `state` varchar(25) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `zip` varchar(25) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `fax` varchar(100) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `photo` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT 'link to photo',
  `comment` text COLLATE utf8mb4_general_ci,
  `createdon` int NOT NULL DEFAULT '0',
  `editedon` int NOT NULL DEFAULT '0',
  `verified` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `userid` (`internalKey`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Contains information about the backend users.';



# --------------------------------------------------------

#
# Table structure for table `dy5r_user_messages`
#

DROP TABLE IF EXISTS `dy5r_user_messages`;
CREATE TABLE `dy5r_user_messages` (
  `id` int NOT NULL AUTO_INCREMENT,
  `type` varchar(15) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `subject` varchar(60) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `message` text COLLATE utf8mb4_general_ci,
  `sender` int NOT NULL DEFAULT '0',
  `recipient` int NOT NULL DEFAULT '0',
  `private` tinyint NOT NULL DEFAULT '0',
  `postdate` int NOT NULL DEFAULT '0',
  `messageread` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Contains messages for the Content Manager messaging system.';



# --------------------------------------------------------

#
# Table structure for table `dy5r_user_roles`
#

DROP TABLE IF EXISTS `dy5r_user_roles`;
CREATE TABLE `dy5r_user_roles` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `description` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `frames` int NOT NULL DEFAULT '0',
  `home` int NOT NULL DEFAULT '0',
  `view_document` int NOT NULL DEFAULT '0',
  `new_document` int NOT NULL DEFAULT '0',
  `save_document` int NOT NULL DEFAULT '0',
  `publish_document` int NOT NULL DEFAULT '0',
  `delete_document` int NOT NULL DEFAULT '0',
  `empty_trash` int NOT NULL DEFAULT '0',
  `action_ok` int NOT NULL DEFAULT '0',
  `logout` int NOT NULL DEFAULT '0',
  `help` int NOT NULL DEFAULT '0',
  `messages` int NOT NULL DEFAULT '0',
  `new_user` int NOT NULL DEFAULT '0',
  `edit_user` int NOT NULL DEFAULT '0',
  `logs` int NOT NULL DEFAULT '0',
  `edit_parser` int NOT NULL DEFAULT '0',
  `save_parser` int NOT NULL DEFAULT '0',
  `edit_template` int NOT NULL DEFAULT '0',
  `settings` int NOT NULL DEFAULT '0',
  `credits` int NOT NULL DEFAULT '0',
  `new_template` int NOT NULL DEFAULT '0',
  `save_template` int NOT NULL DEFAULT '0',
  `delete_template` int NOT NULL DEFAULT '0',
  `edit_snippet` int NOT NULL DEFAULT '0',
  `new_snippet` int NOT NULL DEFAULT '0',
  `save_snippet` int NOT NULL DEFAULT '0',
  `delete_snippet` int NOT NULL DEFAULT '0',
  `edit_chunk` int NOT NULL DEFAULT '0',
  `new_chunk` int NOT NULL DEFAULT '0',
  `save_chunk` int NOT NULL DEFAULT '0',
  `delete_chunk` int NOT NULL DEFAULT '0',
  `empty_cache` int NOT NULL DEFAULT '0',
  `edit_document` int NOT NULL DEFAULT '0',
  `change_password` int NOT NULL DEFAULT '0',
  `error_dialog` int NOT NULL DEFAULT '0',
  `about` int NOT NULL DEFAULT '0',
  `category_manager` int NOT NULL DEFAULT '0',
  `file_manager` int NOT NULL DEFAULT '0',
  `assets_files` int NOT NULL DEFAULT '0',
  `assets_images` int NOT NULL DEFAULT '0',
  `save_user` int NOT NULL DEFAULT '0',
  `delete_user` int NOT NULL DEFAULT '0',
  `save_password` int NOT NULL DEFAULT '0',
  `edit_role` int NOT NULL DEFAULT '0',
  `save_role` int NOT NULL DEFAULT '0',
  `delete_role` int NOT NULL DEFAULT '0',
  `new_role` int NOT NULL DEFAULT '0',
  `access_permissions` int NOT NULL DEFAULT '0',
  `bk_manager` int NOT NULL DEFAULT '0',
  `new_plugin` int NOT NULL DEFAULT '0',
  `edit_plugin` int NOT NULL DEFAULT '0',
  `save_plugin` int NOT NULL DEFAULT '0',
  `delete_plugin` int NOT NULL DEFAULT '0',
  `new_module` int NOT NULL DEFAULT '0',
  `edit_module` int NOT NULL DEFAULT '0',
  `save_module` int NOT NULL DEFAULT '0',
  `delete_module` int NOT NULL DEFAULT '0',
  `exec_module` int NOT NULL DEFAULT '0',
  `view_eventlog` int NOT NULL DEFAULT '0',
  `delete_eventlog` int NOT NULL DEFAULT '0',
  `new_web_user` int NOT NULL DEFAULT '0',
  `edit_web_user` int NOT NULL DEFAULT '0',
  `save_web_user` int NOT NULL DEFAULT '0',
  `delete_web_user` int NOT NULL DEFAULT '0',
  `web_access_permissions` int NOT NULL DEFAULT '0',
  `view_unpublished` int NOT NULL DEFAULT '0',
  `import_static` int NOT NULL DEFAULT '0',
  `export_static` int NOT NULL DEFAULT '0',
  `remove_locks` int NOT NULL DEFAULT '0',
  `display_locks` int NOT NULL DEFAULT '0',
  `change_resourcetype` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Contains information describing the user roles.';



# --------------------------------------------------------

#
# Table structure for table `dy5r_user_settings`
#

DROP TABLE IF EXISTS `dy5r_user_settings`;
CREATE TABLE `dy5r_user_settings` (
  `user` int NOT NULL,
  `setting_name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `setting_value` text COLLATE utf8mb4_general_ci,
  PRIMARY KEY (`user`,`setting_name`),
  KEY `setting_name` (`setting_name`),
  KEY `user` (`user`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Contains backend user settings.';



# --------------------------------------------------------

#
# Table structure for table `dy5r_web_groups`
#

DROP TABLE IF EXISTS `dy5r_web_groups`;
CREATE TABLE `dy5r_web_groups` (
  `id` int NOT NULL AUTO_INCREMENT,
  `webgroup` int NOT NULL DEFAULT '0',
  `webuser` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `ix_group_user` (`webgroup`,`webuser`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Contains data used for web access permissions.';



# --------------------------------------------------------

#
# Table structure for table `dy5r_web_user_attributes`
#

DROP TABLE IF EXISTS `dy5r_web_user_attributes`;
CREATE TABLE `dy5r_web_user_attributes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `internalKey` int NOT NULL DEFAULT '0',
  `fullname` varchar(100) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `role` int NOT NULL DEFAULT '0',
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `phone` varchar(100) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `mobilephone` varchar(100) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `blocked` int NOT NULL DEFAULT '0',
  `blockeduntil` int NOT NULL DEFAULT '0',
  `blockedafter` int NOT NULL DEFAULT '0',
  `logincount` int NOT NULL DEFAULT '0',
  `lastlogin` int NOT NULL DEFAULT '0',
  `thislogin` int NOT NULL DEFAULT '0',
  `failedlogincount` int NOT NULL DEFAULT '0',
  `sessionid` varchar(100) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `dob` int NOT NULL DEFAULT '0',
  `gender` int NOT NULL DEFAULT '0' COMMENT '0 - unknown, 1 - Male 2 - female',
  `country` varchar(25) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `street` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `city` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `state` varchar(25) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `zip` varchar(25) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `fax` varchar(100) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `photo` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT 'link to photo',
  `comment` text COLLATE utf8mb4_general_ci,
  `createdon` int NOT NULL DEFAULT '0',
  `editedon` int NOT NULL DEFAULT '0',
  `verified` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `userid` (`internalKey`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Contains information for web users.';



# --------------------------------------------------------

#
# Table structure for table `dy5r_web_user_settings`
#

DROP TABLE IF EXISTS `dy5r_web_user_settings`;
CREATE TABLE `dy5r_web_user_settings` (
  `webuser` int NOT NULL,
  `setting_name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `setting_value` text COLLATE utf8mb4_general_ci,
  PRIMARY KEY (`webuser`,`setting_name`),
  KEY `setting_name` (`setting_name`),
  KEY `webuserid` (`webuser`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Contains web user settings.';



# --------------------------------------------------------

#
# Table structure for table `dy5r_web_users`
#

DROP TABLE IF EXISTS `dy5r_web_users`;
CREATE TABLE `dy5r_web_users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(100) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `password` varchar(100) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `cachepwd` varchar(100) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT 'Store new unconfirmed password',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



# --------------------------------------------------------

#
# Table structure for table `dy5r_webgroup_access`
#

DROP TABLE IF EXISTS `dy5r_webgroup_access`;
CREATE TABLE `dy5r_webgroup_access` (
  `id` int NOT NULL AUTO_INCREMENT,
  `webgroup` int NOT NULL DEFAULT '0',
  `documentgroup` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Contains data used for web access permissions.';



# --------------------------------------------------------

#
# Table structure for table `dy5r_webgroup_names`
#

DROP TABLE IF EXISTS `dy5r_webgroup_names`;
CREATE TABLE `dy5r_webgroup_names` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(245) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Contains data used for web access permissions.';


#
# Dumping data for table `dy5r_active_user_locks`
#

#
# Dumping data for table `dy5r_active_user_sessions`
#

INSERT INTO `dy5r_active_user_sessions` VALUES
  ('67ggjeqnf4rqi2doj2ukrqmj790l5d16','1','1666289259','127.0.0.1');

#
# Dumping data for table `dy5r_active_users`
#

INSERT INTO `dy5r_active_users` VALUES
  ('67ggjeqnf4rqi2doj2ukrqmj790l5d16','1','admin','1666289259','93',NULL),
  ('9rs2fcialrdqc6mahe51v44026lqqkbf','1','admin','1666195686','8',NULL);

#
# Dumping data for table `dy5r_categories`
#

INSERT INTO `dy5r_categories` VALUES
  ('1','SEO','0'),
  ('2','Templates','0'),
  ('3','Js','0'),
  ('4','Manager and Admin','0'),
  ('5','Content','0'),
  ('6','Navigation','0'),
  ('7','Model item','0'),
  ('8','slider','0'),
  ('9','stock','0'),
  ('10','Service','0'),
  ('11','Special offers','0'),
  ('12','Modals popup','0'),
  ('13','Form','0');

#
# Dumping data for table `dy5r_document_groups`
#

#
# Dumping data for table `dy5r_documentgroup_names`
#

#
# Dumping data for table `dy5r_event_log`
#

INSERT INTO `dy5r_event_log` VALUES
  ('44','0','1666270438','1','0','1','FormLister\\\\Form','<style>pre {font-size:14px;}</style><h3>Lexicon loaded</h3><pre>Array\n(\n    &#91;lexicon&#93; =&gt; Array\n        (\n            &#91;form.protectSubmit&#93; =&gt; Данные успешно отправлены. Нет нужды отправлять их еще раз.\n            &#91;form.submitLimit&#93; =&gt; Отправлять форму можно 1 раз в \n            &#91;form.minutes&#93; =&gt; мин\n            &#91;form.seconds&#93; =&gt; сек\n            &#91;form.dateFormat&#93; =&gt; d.m.Y в H:i:s\n            &#91;form.default_successTpl&#93; =&gt; @CODE:Форма успешно отправлена в &#91;+form.date.value+&#93;\n            &#91;form.form_failed&#93; =&gt; Не удалось отправить письмо.\n        )\n\n)\n</pre><p>Time: 0.035557985305786</p><hr><h3>Set fields from $_REQUEST</h3><pre>Array\n(\n    &#91;formid&#93; =&gt; basic\n    &#91;type&#93; =&gt; form\n    &#91;phone_manager&#93; =&gt; +74957170707\n    &#91;form_key&#93; =&gt; callback\n    &#91;form_name&#93; =&gt; Заказать звонок\n    &#91;phone&#93; =&gt; +7 (915) 999-99-99\n    &#91;policy&#93; =&gt; on\n)\n</pre><p>Time: 0.035622119903564</p><hr><h3>No validation rules defined in rules parameter</h3><pre>No data provided\n</pre><p>Time: 0.05846905708313</p><hr><h3>No validation rules defined in rules parameter</h3><pre>No data provided\n</pre><p>Time: 0.080115079879761</p><hr><h3>Prepare to validate fields</h3><pre>Array\n(\n    &#91;fields&#93; =&gt; Array\n        (\n            &#91;formid&#93; =&gt; basic\n            &#91;type&#93; =&gt; form\n            &#91;phone_manager&#93; =&gt; +74957170707\n            &#91;form_key&#93; =&gt; callback\n            &#91;form_name&#93; =&gt; Заказать звонок\n            &#91;phone&#93; =&gt; +7 (915) 999-99-99\n            &#91;policy&#93; =&gt; on\n        )\n\n    &#91;rules&#93; =&gt; No data provided\n\n)\n</pre><p>Time: 0.080135107040405</p><hr><h3>No validation rules defined in fileRules parameter</h3><pre>No data provided\n</pre><p>Time: 0.094414949417114</p><hr><h3>Prepare to validate files</h3><pre>Array\n(\n    &#91;fields&#93; =&gt; No data provided\n\n    &#91;rules&#93; =&gt; No data provided\n\n)\n</pre><p>Time: 0.094427108764648</p><hr><h3>Mail report</h3><pre>Array\n(\n    &#91;report&#93; =&gt; \n&lt;h2 style=&quot;padding-left: 30px; font-family: Arial, sans-serif;&quot;&gt;На сайте Chery Exeed оставлена заявка&lt;/h2&gt;\n\n&lt;table style=&quot;margin-left: 30px; width: 600px; font-size: 14px; line-height: 22px;&quot; rules=&quot;none&quot;&gt;\n	&lt;tr valign=&quot;top&quot;&gt;\n		&lt;td style=&quot;padding: 4px 14px 4px 8px; min-width: 120px; border-bottom: #ededed solid 1px; width: 200px; font: 14px/24px Arial, sans-serif;&quot;&gt;\n			Название формы:\n		&lt;/td&gt;\n		&lt;td style=&quot;padding: 4px 14px 4px 8px; min-width: 120px; border-bottom: #ededed solid 1px; width: 200px; font: 14px/24px Arial, sans-serif;&quot;&gt;\n			\n		&lt;/td&gt;\n	&lt;/tr&gt;\n	\n	&lt;tr valign=&quot;top&quot;&gt;\n		&lt;td style=&quot;padding: 4px 14px 4px 8px; min-width: 120px; border-bottom: #ededed solid 1px; width: 200px; font: 14px/24px Arial, sans-serif;&quot;&gt;\n			Телефон:\n		&lt;/td&gt;\n		&lt;td style=&quot;padding: 4px 14px 4px 8px; min-width: 120px; border-bottom: #ededed solid 1px; width: 200px; font: 14px/24px Arial, sans-serif;&quot;&gt;\n			+7 (915) 999-99-99\n		&lt;/td&gt;\n	&lt;/tr&gt;\n	\n	\n	\n&lt;/table&gt;\n&lt;br&gt;\n    &#91;mailer_config&#93; =&gt; Array\n        (\n            &#91;isHtml&#93; =&gt; 1\n            &#91;to&#93; =&gt; hausdr@gmail.com\n            &#91;from&#93; =&gt; \n            &#91;fromName&#93; =&gt; LosCotletos Modx\n            &#91;subject&#93; =&gt; Заполнена форма «» на сайте LosCotletos Modx\n            &#91;replyTo&#93; =&gt; \n            &#91;cc&#93; =&gt; \n            &#91;bcc&#93; =&gt; \n            &#91;noemail&#93; =&gt; \n        )\n\n    &#91;result&#93; =&gt; 1\n)\n</pre><p>Time: 0.75259900093079</p><hr><h3>Mail autosender report</h3><pre>Array\n(\n    &#91;report&#93; =&gt; \n    &#91;mailer_config&#93; =&gt; Array\n        (\n            &#91;isHtml&#93; =&gt; 1\n            &#91;to&#93; =&gt; \n            &#91;from&#93; =&gt; \n            &#91;fromName&#93; =&gt; LosCotletos Modx\n            &#91;subject&#93; =&gt; Заполнена форма «» на сайте LosCotletos Modx\n            &#91;replyTo&#93; =&gt; \n            &#91;cc&#93; =&gt; \n            &#91;bcc&#93; =&gt; \n            &#91;noemail&#93; =&gt; \n        )\n\n    &#91;result&#93; =&gt; 1\n)\n</pre><p>Time: 0.75303316116333</p><hr><h3>Form procession complete</h3><pre>Array\n(\n    &#91;fields&#93; =&gt; Array\n        (\n            &#91;formid&#93; =&gt; basic\n            &#91;type&#93; =&gt; form\n            &#91;phone_manager&#93; =&gt; +74957170707\n            &#91;form_key&#93; =&gt; callback\n            &#91;form_name&#93; =&gt; Заказать звонок\n            &#91;phone&#93; =&gt; +7 (915) 999-99-99\n            &#91;policy&#93; =&gt; on\n            &#91;form.date&#93; =&gt; 20.10.2022 в 15:53:58\n        )\n\n    &#91;errors&#93; =&gt; No data provided\n\n    &#91;messages&#93; =&gt; No data provided\n\n    &#91;files&#93; =&gt; No data provided\n\n    &#91;status&#93; =&gt; 1\n)\n</pre><p>Time: 0.75310802459717</p><hr><h3>Output</h3><pre>&#123;\n  &quot;fields&quot;: &#123;\n    &quot;formid&quot;: &quot;basic&quot;,\n    &quot;type&quot;: &quot;form&quot;,\n    &quot;phone_manager&quot;: &quot;+74957170707&quot;,\n    &quot;form_key&quot;: &quot;callback&quot;,\n    &quot;form_name&quot;: &quot;\\u0417\\u0430\\u043a\\u0430\\u0437\\u0430\\u0442\\u044c \\u0437\\u0432\\u043e\\u043d\\u043e\\u043a&quot;,\n    &quot;phone&quot;: &quot;+7 (915) 999-99-99&quot;,\n    &quot;policy&quot;: &quot;on&quot;,\n    &quot;form.date&quot;: &quot;20.10.2022 \\u0432 15:53:58&quot;\n  &#125;,\n  &quot;errors&quot;: &#91;\n    \n  &#93;,\n  &quot;messages&quot;: &#91;\n    \n  &#93;,\n  &quot;status&quot;: true,\n  &quot;captcha&quot;: &quot;&quot;\n&#125;</pre><p>Time: 0.7532320022583</p><hr><p>Total time: 0.75326204299927</p>'),
  ('45','0','1666270449','1','0','1','FormLister\\\\Form','<style>pre {font-size:14px;}</style><h3>Lexicon loaded</h3><pre>Array\n(\n    &#91;lexicon&#93; =&gt; Array\n        (\n            &#91;form.protectSubmit&#93; =&gt; Данные успешно отправлены. Нет нужды отправлять их еще раз.\n            &#91;form.submitLimit&#93; =&gt; Отправлять форму можно 1 раз в \n            &#91;form.minutes&#93; =&gt; мин\n            &#91;form.seconds&#93; =&gt; сек\n            &#91;form.dateFormat&#93; =&gt; d.m.Y в H:i:s\n            &#91;form.default_successTpl&#93; =&gt; @CODE:Форма успешно отправлена в &#91;+form.date.value+&#93;\n            &#91;form.form_failed&#93; =&gt; Не удалось отправить письмо.\n        )\n\n)\n</pre><p>Time: 0.0015420913696289</p><hr><h3>Set fields from $_REQUEST</h3><pre>Array\n(\n    &#91;formid&#93; =&gt; basic\n    &#91;type&#93; =&gt; form\n    &#91;phone_manager&#93; =&gt; +74957170707\n    &#91;form_key&#93; =&gt; callback\n    &#91;form_name&#93; =&gt; Заказать звонок\n    &#91;phone&#93; =&gt; +7 (915) 999-99-99\n    &#91;policy&#93; =&gt; on\n)\n</pre><p>Time: 0.0015759468078613</p><hr><h3>No validation rules defined in rules parameter</h3><pre>No data provided\n</pre><p>Time: 0.002039909362793</p><hr><h3>No validation rules defined in rules parameter</h3><pre>No data provided\n</pre><p>Time: 0.0025100708007812</p><hr><h3>Prepare to validate fields</h3><pre>Array\n(\n    &#91;fields&#93; =&gt; Array\n        (\n            &#91;formid&#93; =&gt; basic\n            &#91;type&#93; =&gt; form\n            &#91;phone_manager&#93; =&gt; +74957170707\n            &#91;form_key&#93; =&gt; callback\n            &#91;form_name&#93; =&gt; Заказать звонок\n            &#91;phone&#93; =&gt; +7 (915) 999-99-99\n            &#91;policy&#93; =&gt; on\n        )\n\n    &#91;rules&#93; =&gt; No data provided\n\n)\n</pre><p>Time: 0.0025229454040527</p><hr><h3>No validation rules defined in fileRules parameter</h3><pre>No data provided\n</pre><p>Time: 0.002924919128418</p><hr><h3>Prepare to validate files</h3><pre>Array\n(\n    &#91;fields&#93; =&gt; No data provided\n\n    &#91;rules&#93; =&gt; No data provided\n\n)\n</pre><p>Time: 0.0029330253601074</p><hr><h3>Mail report</h3><pre>Array\n(\n    &#91;report&#93; =&gt; \n&lt;h2 style=&quot;padding-left: 30px; font-family: Arial, sans-serif;&quot;&gt;На сайте Chery Exeed оставлена заявка&lt;/h2&gt;\n\n&lt;table style=&quot;margin-left: 30px; width: 600px; font-size: 14px; line-height: 22px;&quot; rules=&quot;none&quot;&gt;\n	&lt;tr valign=&quot;top&quot;&gt;\n		&lt;td style=&quot;padding: 4px 14px 4px 8px; min-width: 120px; border-bottom: #ededed solid 1px; width: 200px; font: 14px/24px Arial, sans-serif;&quot;&gt;\n			Название формы:\n		&lt;/td&gt;\n		&lt;td style=&quot;padding: 4px 14px 4px 8px; min-width: 120px; border-bottom: #ededed solid 1px; width: 200px; font: 14px/24px Arial, sans-serif;&quot;&gt;\n			\n		&lt;/td&gt;\n	&lt;/tr&gt;\n	\n	&lt;tr valign=&quot;top&quot;&gt;\n		&lt;td style=&quot;padding: 4px 14px 4px 8px; min-width: 120px; border-bottom: #ededed solid 1px; width: 200px; font: 14px/24px Arial, sans-serif;&quot;&gt;\n			Телефон:\n		&lt;/td&gt;\n		&lt;td style=&quot;padding: 4px 14px 4px 8px; min-width: 120px; border-bottom: #ededed solid 1px; width: 200px; font: 14px/24px Arial, sans-serif;&quot;&gt;\n			+7 (915) 999-99-99\n		&lt;/td&gt;\n	&lt;/tr&gt;\n	\n	\n	\n&lt;/table&gt;\n&lt;br&gt;\n    &#91;mailer_config&#93; =&gt; Array\n        (\n            &#91;isHtml&#93; =&gt; 1\n            &#91;to&#93; =&gt; hausdr@gmail.com\n            &#91;from&#93; =&gt; \n            &#91;fromName&#93; =&gt; LosCotletos Modx\n            &#91;subject&#93; =&gt; Заполнена форма «» на сайте LosCotletos Modx\n            &#91;replyTo&#93; =&gt; \n            &#91;cc&#93; =&gt; \n            &#91;bcc&#93; =&gt; \n            &#91;noemail&#93; =&gt; \n        )\n\n    &#91;result&#93; =&gt; 1\n)\n</pre><p>Time: 0.11984395980835</p><hr><h3>Mail autosender report</h3><pre>Array\n(\n    &#91;report&#93; =&gt; \n    &#91;mailer_config&#93; =&gt; Array\n        (\n            &#91;isHtml&#93; =&gt; 1\n            &#91;to&#93; =&gt; \n            &#91;from&#93; =&gt; \n            &#91;fromName&#93; =&gt; LosCotletos Modx\n            &#91;subject&#93; =&gt; Заполнена форма «» на сайте LosCotletos Modx\n            &#91;replyTo&#93; =&gt; \n            &#91;cc&#93; =&gt; \n            &#91;bcc&#93; =&gt; \n            &#91;noemail&#93; =&gt; \n        )\n\n    &#91;result&#93; =&gt; 1\n)\n</pre><p>Time: 0.1204400062561</p><hr><h3>Form procession complete</h3><pre>Array\n(\n    &#91;fields&#93; =&gt; Array\n        (\n            &#91;formid&#93; =&gt; basic\n            &#91;type&#93; =&gt; form\n            &#91;phone_manager&#93; =&gt; +74957170707\n            &#91;form_key&#93; =&gt; callback\n            &#91;form_name&#93; =&gt; Заказать звонок\n            &#91;phone&#93; =&gt; +7 (915) 999-99-99\n            &#91;policy&#93; =&gt; on\n            &#91;form.date&#93; =&gt; 20.10.2022 в 15:54:09\n        )\n\n    &#91;errors&#93; =&gt; No data provided\n\n    &#91;messages&#93; =&gt; No data provided\n\n    &#91;files&#93; =&gt; No data provided\n\n    &#91;status&#93; =&gt; 1\n)\n</pre><p>Time: 0.12055587768555</p><hr><h3>Output</h3><pre>&#123;\n  &quot;fields&quot;: &#123;\n    &quot;formid&quot;: &quot;basic&quot;,\n    &quot;type&quot;: &quot;form&quot;,\n    &quot;phone_manager&quot;: &quot;+74957170707&quot;,\n    &quot;form_key&quot;: &quot;callback&quot;,\n    &quot;form_name&quot;: &quot;\\u0417\\u0430\\u043a\\u0430\\u0437\\u0430\\u0442\\u044c \\u0437\\u0432\\u043e\\u043d\\u043e\\u043a&quot;,\n    &quot;phone&quot;: &quot;+7 (915) 999-99-99&quot;,\n    &quot;policy&quot;: &quot;on&quot;,\n    &quot;form.date&quot;: &quot;20.10.2022 \\u0432 15:54:09&quot;\n  &#125;,\n  &quot;errors&quot;: &#91;\n    \n  &#93;,\n  &quot;messages&quot;: &#91;\n    \n  &#93;,\n  &quot;status&quot;: true,\n  &quot;captcha&quot;: &quot;&quot;\n&#125;</pre><p>Time: 0.12069892883301</p><hr><p>Total time: 0.12073588371277</p>'),
  ('46','0','1666270562','1','0','1','FormLister\\\\Form','<style>pre {font-size:14px;}</style><h3>Lexicon loaded</h3><pre>Array\n(\n    &#91;lexicon&#93; =&gt; Array\n        (\n            &#91;form.protectSubmit&#93; =&gt; Данные успешно отправлены. Нет нужды отправлять их еще раз.\n            &#91;form.submitLimit&#93; =&gt; Отправлять форму можно 1 раз в \n            &#91;form.minutes&#93; =&gt; мин\n            &#91;form.seconds&#93; =&gt; сек\n            &#91;form.dateFormat&#93; =&gt; d.m.Y в H:i:s\n            &#91;form.default_successTpl&#93; =&gt; @CODE:Форма успешно отправлена в &#91;+form.date.value+&#93;\n            &#91;form.form_failed&#93; =&gt; Не удалось отправить письмо.\n        )\n\n)\n</pre><p>Time: 0.0031800270080566</p><hr><h3>Set fields from $_REQUEST</h3><pre>Array\n(\n    &#91;formid&#93; =&gt; basic\n    &#91;type&#93; =&gt; form\n    &#91;phone_manager&#93; =&gt; +74957170707\n    &#91;form_key&#93; =&gt; callback\n    &#91;form_name&#93; =&gt; Заказать звонок\n    &#91;phone&#93; =&gt; +7 (915) 999-99-99\n    &#91;policy&#93; =&gt; on\n)\n</pre><p>Time: 0.0032150745391846</p><hr><h3>No validation rules defined in rules parameter</h3><pre>No data provided\n</pre><p>Time: 0.0037651062011719</p><hr><h3>No validation rules defined in rules parameter</h3><pre>No data provided\n</pre><p>Time: 0.0043370723724365</p><hr><h3>Prepare to validate fields</h3><pre>Array\n(\n    &#91;fields&#93; =&gt; Array\n        (\n            &#91;formid&#93; =&gt; basic\n            &#91;type&#93; =&gt; form\n            &#91;phone_manager&#93; =&gt; +74957170707\n            &#91;form_key&#93; =&gt; callback\n            &#91;form_name&#93; =&gt; Заказать звонок\n            &#91;phone&#93; =&gt; +7 (915) 999-99-99\n            &#91;policy&#93; =&gt; on\n        )\n\n    &#91;rules&#93; =&gt; No data provided\n\n)\n</pre><p>Time: 0.0043511390686035</p><hr><h3>No validation rules defined in fileRules parameter</h3><pre>No data provided\n</pre><p>Time: 0.0048000812530518</p><hr><h3>Prepare to validate files</h3><pre>Array\n(\n    &#91;fields&#93; =&gt; No data provided\n\n    &#91;rules&#93; =&gt; No data provided\n\n)\n</pre><p>Time: 0.0048079490661621</p><hr><h3>Mail report</h3><pre>Array\n(\n    &#91;report&#93; =&gt; \n&lt;h2 style=&quot;padding-left: 30px; font-family: Arial, sans-serif;&quot;&gt;На сайте Chery Exeed оставлена заявка&lt;/h2&gt;\n\n&lt;table style=&quot;margin-left: 30px; width: 600px; font-size: 14px; line-height: 22px;&quot; rules=&quot;none&quot;&gt;\n	&lt;tr valign=&quot;top&quot;&gt;\n		&lt;td style=&quot;padding: 4px 14px 4px 8px; min-width: 120px; border-bottom: #ededed solid 1px; width: 200px; font: 14px/24px Arial, sans-serif;&quot;&gt;\n			Название формы:\n		&lt;/td&gt;\n		&lt;td style=&quot;padding: 4px 14px 4px 8px; min-width: 120px; border-bottom: #ededed solid 1px; width: 200px; font: 14px/24px Arial, sans-serif;&quot;&gt;\n			\n		&lt;/td&gt;\n	&lt;/tr&gt;\n	\n	&lt;tr valign=&quot;top&quot;&gt;\n		&lt;td style=&quot;padding: 4px 14px 4px 8px; min-width: 120px; border-bottom: #ededed solid 1px; width: 200px; font: 14px/24px Arial, sans-serif;&quot;&gt;\n			Телефон:\n		&lt;/td&gt;\n		&lt;td style=&quot;padding: 4px 14px 4px 8px; min-width: 120px; border-bottom: #ededed solid 1px; width: 200px; font: 14px/24px Arial, sans-serif;&quot;&gt;\n			+7 (915) 999-99-99\n		&lt;/td&gt;\n	&lt;/tr&gt;\n	\n	\n	\n&lt;/table&gt;\n&lt;br&gt;\n    &#91;mailer_config&#93; =&gt; Array\n        (\n            &#91;isHtml&#93; =&gt; 1\n            &#91;to&#93; =&gt; hausdr@gmail.com\n            &#91;from&#93; =&gt; \n            &#91;fromName&#93; =&gt; LosCotletos Modx\n            &#91;subject&#93; =&gt; Заполнена форма «» на сайте LosCotletos Modx\n            &#91;replyTo&#93; =&gt; \n            &#91;cc&#93; =&gt; \n            &#91;bcc&#93; =&gt; \n            &#91;noemail&#93; =&gt; \n        )\n\n    &#91;result&#93; =&gt; 1\n)\n</pre><p>Time: 0.12638998031616</p><hr><h3>Mail autosender report</h3><pre>Array\n(\n    &#91;report&#93; =&gt; \n    &#91;mailer_config&#93; =&gt; Array\n        (\n            &#91;isHtml&#93; =&gt; 1\n            &#91;to&#93; =&gt; \n            &#91;from&#93; =&gt; \n            &#91;fromName&#93; =&gt; LosCotletos Modx\n            &#91;subject&#93; =&gt; Заполнена форма «» на сайте LosCotletos Modx\n            &#91;replyTo&#93; =&gt; \n            &#91;cc&#93; =&gt; \n            &#91;bcc&#93; =&gt; \n            &#91;noemail&#93; =&gt; \n        )\n\n    &#91;result&#93; =&gt; 1\n)\n</pre><p>Time: 0.12698006629944</p><hr><h3>Form procession complete</h3><pre>Array\n(\n    &#91;fields&#93; =&gt; Array\n        (\n            &#91;formid&#93; =&gt; basic\n            &#91;type&#93; =&gt; form\n            &#91;phone_manager&#93; =&gt; +74957170707\n            &#91;form_key&#93; =&gt; callback\n            &#91;form_name&#93; =&gt; Заказать звонок\n            &#91;phone&#93; =&gt; +7 (915) 999-99-99\n            &#91;policy&#93; =&gt; on\n            &#91;form.date&#93; =&gt; 20.10.2022 в 15:56:02\n        )\n\n    &#91;errors&#93; =&gt; No data provided\n\n    &#91;messages&#93; =&gt; No data provided\n\n    &#91;files&#93; =&gt; No data provided\n\n    &#91;status&#93; =&gt; 1\n)\n</pre><p>Time: 0.12711000442505</p><hr><h3>Output</h3><pre>&#123;\n  &quot;fields&quot;: &#123;\n    &quot;formid&quot;: &quot;basic&quot;,\n    &quot;type&quot;: &quot;form&quot;,\n    &quot;phone_manager&quot;: &quot;+74957170707&quot;,\n    &quot;form_key&quot;: &quot;callback&quot;,\n    &quot;form_name&quot;: &quot;\\u0417\\u0430\\u043a\\u0430\\u0437\\u0430\\u0442\\u044c \\u0437\\u0432\\u043e\\u043d\\u043e\\u043a&quot;,\n    &quot;phone&quot;: &quot;+7 (915) 999-99-99&quot;,\n    &quot;policy&quot;: &quot;on&quot;,\n    &quot;form.date&quot;: &quot;20.10.2022 \\u0432 15:56:02&quot;\n  &#125;,\n  &quot;errors&quot;: &#91;\n    \n  &#93;,\n  &quot;messages&quot;: &#91;\n    \n  &#93;,\n  &quot;status&quot;: true,\n  &quot;captcha&quot;: &quot;&quot;\n&#125;</pre><p>Time: 0.12724995613098</p><hr><p>Total time: 0.1272931098938</p>'),
  ('47','0','1666285491','1','0','1','FormLister','Parameter &formid is not set'),
  ('48','0','1666285550','1','0','1','FormLister','Parameter &formid is not set'),
  ('49','0','1666285693','1','0','1','FormLister','Parameter &formid is not set'),
  ('50','0','1666285839','1','0','1','FormLister','Parameter &formid is not set'),
  ('51','0','1666286029','1','0','1','FormLister','Parameter &formid is not set'),
  ('52','0','1666286062','1','0','1','FormLister\\\\Form','<style>pre {font-size:14px;}</style><h3>Lexicon loaded</h3><pre>Array\n(\n    &#91;lexicon&#93; =&gt; Array\n        (\n            &#91;form.protectSubmit&#93; =&gt; Данные успешно отправлены. Нет нужды отправлять их еще раз.\n            &#91;form.submitLimit&#93; =&gt; Отправлять форму можно 1 раз в \n            &#91;form.minutes&#93; =&gt; мин\n            &#91;form.seconds&#93; =&gt; сек\n            &#91;form.dateFormat&#93; =&gt; d.m.Y в H:i:s\n            &#91;form.default_successTpl&#93; =&gt; @CODE:Форма успешно отправлена в &#91;+form.date.value+&#93;\n            &#91;form.form_failed&#93; =&gt; Не удалось отправить письмо.\n        )\n\n)\n</pre><p>Time: 0.0015277862548828</p><hr><h3>Set fields from $_REQUEST</h3><pre>Array\n(\n    &#91;formid&#93; =&gt; basic\n    &#91;type&#93; =&gt; form\n    &#91;phone_manager&#93; =&gt; +74957170707\n    &#91;form_key&#93; =&gt; callback\n    &#91;form_name&#93; =&gt; Оставить заявку\n    &#91;phone&#93; =&gt; +7 (999) 999-99-99\n    &#91;policy&#93; =&gt; on\n)\n</pre><p>Time: 0.0015549659729004</p><hr><h3>No validation rules defined in rules parameter</h3><pre>No data provided\n</pre><p>Time: 0.0018680095672607</p><hr><h3>No validation rules defined in rules parameter</h3><pre>No data provided\n</pre><p>Time: 0.0021967887878418</p><hr><h3>Prepare to validate fields</h3><pre>Array\n(\n    &#91;fields&#93; =&gt; Array\n        (\n            &#91;formid&#93; =&gt; basic\n            &#91;type&#93; =&gt; form\n            &#91;phone_manager&#93; =&gt; +74957170707\n            &#91;form_key&#93; =&gt; callback\n            &#91;form_name&#93; =&gt; Оставить заявку\n            &#91;phone&#93; =&gt; +7 (999) 999-99-99\n            &#91;policy&#93; =&gt; on\n        )\n\n    &#91;rules&#93; =&gt; No data provided\n\n)\n</pre><p>Time: 0.0022058486938477</p><hr><h3>No validation rules defined in fileRules parameter</h3><pre>No data provided\n</pre><p>Time: 0.0024650096893311</p><hr><h3>Prepare to validate files</h3><pre>Array\n(\n    &#91;fields&#93; =&gt; No data provided\n\n    &#91;rules&#93; =&gt; No data provided\n\n)\n</pre><p>Time: 0.0024688243865967</p><hr><h3>Mail report</h3><pre>Array\n(\n    &#91;report&#93; =&gt; &lt;h2 style=&quot;padding-left: 30px; font-family: Arial, sans-serif;&quot;&gt;На сайте оставлена заявка&lt;/h2&gt;\n\n&lt;table style=&quot;margin-left: 30px; width: 600px; font-size: 14px; line-height: 22px;&quot; rules=&quot;none&quot;&gt;\n	&lt;tr valign=&quot;top&quot;&gt;\n		&lt;td style=&quot;padding: 4px 14px 4px 8px; min-width: 120px; border-bottom: #ededed solid 1px; width: 200px; font: 14px/24px Arial, sans-serif;&quot;&gt;\n			Название формы:\n		&lt;/td&gt;\n		&lt;td style=&quot;padding: 4px 14px 4px 8px; min-width: 120px; border-bottom: #ededed solid 1px; width: 200px; font: 14px/24px Arial, sans-serif;&quot;&gt;\n			Оставить заявку\n		&lt;/td&gt;\n	&lt;/tr&gt;\n	\n	&lt;tr valign=&quot;top&quot;&gt;\n		&lt;td style=&quot;padding: 4px 14px 4px 8px; min-width: 120px; border-bottom: #ededed solid 1px; width: 200px; font: 14px/24px Arial, sans-serif;&quot;&gt;\n			Телефон:\n		&lt;/td&gt;\n		&lt;td style=&quot;padding: 4px 14px 4px 8px; min-width: 120px; border-bottom: #ededed solid 1px; width: 200px; font: 14px/24px Arial, sans-serif;&quot;&gt;\n			+7 (999) 999-99-99\n		&lt;/td&gt;\n	&lt;/tr&gt;\n	\n&lt;/table&gt;\n&lt;br&gt;\n    &#91;mailer_config&#93; =&gt; Array\n        (\n            &#91;isHtml&#93; =&gt; 1\n            &#91;to&#93; =&gt; hausdr@gmail.com, test@test.com\n            &#91;from&#93; =&gt; \n            &#91;fromName&#93; =&gt; KIA\n            &#91;subject&#93; =&gt; Заполнена форма «Оставить заявку» на сайте KIA\n            &#91;replyTo&#93; =&gt; \n            &#91;cc&#93; =&gt; \n            &#91;bcc&#93; =&gt; \n            &#91;noemail&#93; =&gt; \n        )\n\n    &#91;result&#93; =&gt; 1\n)\n</pre><p>Time: 0.071826934814453</p><hr><h3>Mail autosender report</h3><pre>Array\n(\n    &#91;report&#93; =&gt; \n    &#91;mailer_config&#93; =&gt; Array\n        (\n            &#91;isHtml&#93; =&gt; 1\n            &#91;to&#93; =&gt; \n            &#91;from&#93; =&gt; \n            &#91;fromName&#93; =&gt; KIA\n            &#91;subject&#93; =&gt; Заполнена форма «Оставить заявку» на сайте KIA\n            &#91;replyTo&#93; =&gt; \n            &#91;cc&#93; =&gt; \n            &#91;bcc&#93; =&gt; \n            &#91;noemail&#93; =&gt; \n        )\n\n    &#91;result&#93; =&gt; 1\n)\n</pre><p>Time: 0.072141885757446</p><hr><h3>Form procession complete</h3><pre>Array\n(\n    &#91;fields&#93; =&gt; Array\n        (\n            &#91;formid&#93; =&gt; basic\n            &#91;type&#93; =&gt; form\n            &#91;phone_manager&#93; =&gt; +74957170707\n            &#91;form_key&#93; =&gt; callback\n            &#91;form_name&#93; =&gt; Оставить заявку\n            &#91;phone&#93; =&gt; +7 (999) 999-99-99\n            &#91;policy&#93; =&gt; on\n            &#91;form.date&#93; =&gt; 20.10.2022 в 20:14:22\n        )\n\n    &#91;errors&#93; =&gt; No data provided\n\n    &#91;messages&#93; =&gt; No data provided\n\n    &#91;files&#93; =&gt; No data provided\n\n    &#91;status&#93; =&gt; 1\n)\n</pre><p>Time: 0.072204828262329</p><hr><h3>Output</h3><pre>&#123;\n  &quot;fields&quot;: &#123;\n    &quot;formid&quot;: &quot;basic&quot;,\n    &quot;type&quot;: &quot;form&quot;,\n    &quot;phone_manager&quot;: &quot;+74957170707&quot;,\n    &quot;form_key&quot;: &quot;callback&quot;,\n    &quot;form_name&quot;: &quot;\\u041e\\u0441\\u0442\\u0430\\u0432\\u0438\\u0442\\u044c \\u0437\\u0430\\u044f\\u0432\\u043a\\u0443&quot;,\n    &quot;phone&quot;: &quot;+7 (999) 999-99-99&quot;,\n    &quot;policy&quot;: &quot;on&quot;,\n    &quot;form.date&quot;: &quot;20.10.2022 \\u0432 20:14:22&quot;\n  &#125;,\n  &quot;errors&quot;: &#91;\n    \n  &#93;,\n  &quot;messages&quot;: &#91;\n    \n  &#93;,\n  &quot;status&quot;: true,\n  &quot;captcha&quot;: &quot;&quot;\n&#125;</pre><p>Time: 0.072287797927856</p><hr><p>Total time: 0.072307825088501</p>');

#
# Dumping data for table `dy5r_manager_log`
#

INSERT INTO `dy5r_manager_log` VALUES
  ('1','1665769891','1','admin','58','-','MODX','Logged in','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('2','1665769896','1','admin','17','-','-','Editing settings','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('3','1665770593','1','admin','30','-','-','Saving settings','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('4','1665770873','1','admin','17','-','-','Editing settings','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('5','1665770898','1','admin','30','-','-','Saving settings','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('6','1665770910','1','admin','17','-','-','Editing settings','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('7','1665770913','1','admin','30','-','-','Saving settings','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('8','1665771098','1','admin','27','1','Evolution CMS Install Success','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('9','1665771220','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('10','1665771239','1','admin','5','1','Evolution CMS Install Success','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('11','1665771239','1','admin','27','1','Evolution CMS Install Success','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('12','1665771280','1','admin','17','-','-','Editing settings','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('13','1665771307','1','admin','30','-','-','Saving settings','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('14','1665771528','1','admin','27','1','Evolution CMS Install Success','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('15','1665771545','1','admin','5','1','Home LC','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('16','1665771545','1','admin','3','1','Home LC','Viewing data for resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('17','1665858021','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('18','1665858024','1','admin','16','3','Minimal Template','Editing template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('19','1665858066','1','admin','20','3','Main page','Saving template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('20','1665858066','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('21','1665858074','1','admin','78','1','header','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('22','1665858123','1','admin','27','1','Home LC','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('23','1665858131','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('24','1665858142','1','admin','16','3','Main page','Editing template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('25','1665858160','1','admin','20','3','Main page','Saving template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('26','1665858161','1','admin','16','3','Main page','Editing template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('27','1665858162','1','admin','20','3','Main page','Saving template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('28','1665858162','1','admin','16','3','Main page','Editing template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('29','1665858166','1','admin','20','3','Main page','Saving template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('30','1665858166','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('31','1665858200','1','admin','27','1','Home LC','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36');

INSERT INTO `dy5r_manager_log` VALUES
  ('32','1665858215','1','admin','5','1','Home LC','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('33','1665858216','1','admin','3','1','Home LC','Viewing data for resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('34','1665858231','1','admin','16','3','Main page','Editing template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('35','1665858696','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('36','1665858700','1','admin','78','1','header','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('37','1665859385','1','admin','79','1','header','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('38','1665859385','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('39','1665859391','1','admin','16','3','Main page','Editing template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('40','1665859464','1','admin','20','3','Main page','Saving template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('41','1665859464','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('42','1665859469','1','admin','78','1','header','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('43','1665859477','1','admin','79','1','head','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('44','1665859477','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('45','1665859489','1','admin','77','-','Новый чанк','Creating a new Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('46','1665859522','1','admin','79','-','header','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('47','1665859522','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('48','1665859522','1','admin','67','-','-','Removing locks','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('49','1665859529','1','admin','16','3','Main page','Editing template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('50','1665859544','1','admin','20','3','Main page','Saving template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('51','1665859545','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('52','1665859567','1','admin','78','1','head','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('53','1665859583','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('54','1665859585','1','admin','78','3','header','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('55','1665859601','1','admin','79','3','header','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('56','1665859601','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('57','1665859796','1','admin','77','-','Новый чанк','Creating a new Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('58','1665859977','1','admin','79','-','footer','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('59','1665859977','1','admin','78','4','footer','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('60','1665859992','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('61','1665859998','1','admin','16','3','Main page','Editing template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('62','1665860009','1','admin','20','3','Main page','Saving template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36');

INSERT INTO `dy5r_manager_log` VALUES
  ('63','1665860009','1','admin','16','3','Main page','Editing template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('64','1665860023','1','admin','20','3','Main page','Saving template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('65','1665860023','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('66','1665860029','1','admin','79','4','footer','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('67','1665860029','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('68','1665860031','1','admin','27','1','Home LC','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('69','1665860042','1','admin','5','1','Home LC','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('70','1665860042','1','admin','3','1','Home LC','Viewing data for resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('71','1665860148','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('72','1665860157','1','admin','78','4','footer','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('73','1665860164','1','admin','79','4','footer','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('74','1665860164','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('75','1665860181','1','admin','77','-','Новый чанк','Creating a new Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('76','1665860272','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('77','1665860279','1','admin','16','3','Main page','Editing template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('78','1665860441','1','admin','67','-','-','Removing locks','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('79','1665860444','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('80','1665860452','1','admin','78','4','footer','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('81','1665860568','1','admin','79','4','footer','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('82','1665860568','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('83','1665860580','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('84','1665860582','1','admin','78','1','head','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('85','1665860599','1','admin','79','1','head','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('86','1665860599','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('87','1665860639','1','admin','20','3','Main page','Saving template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('88','1665860639','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('89','1665860674','1','admin','78','1','head','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('90','1665860686','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('91','1665860733','1','admin','78','1','head','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('92','1665860750','1','admin','79','1','head','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('93','1665860750','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36');

INSERT INTO `dy5r_manager_log` VALUES
  ('94','1665860755','1','admin','23','-','Новый сниппет','Creating a new Snippet','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('95','1665860829','1','admin','24','-','version','Saving Snippet','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('96','1665860830','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('97','1665860830','1','admin','67','-','-','Removing locks','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('98','1665860838','1','admin','78','1','head','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('99','1665860841','1','admin','79','1','head','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('100','1665860841','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('101','1665860887','1','admin','22','10','version','Editing Snippet','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('102','1665860920','1','admin','24','10','version','Saving Snippet','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('103','1665860920','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('104','1665860974','1','admin','22','9','summary','Editing Snippet','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('105','1665860991','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('106','1665860993','1','admin','22','10','version','Editing Snippet','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('107','1665861014','1','admin','24','10','version','Saving Snippet','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('108','1665861015','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('109','1665861032','1','admin','22','10','version','Editing Snippet','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('110','1665861039','1','admin','24','10','version','Saving Snippet','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('111','1665861039','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('112','1665861065','1','admin','22','10','version','Editing Snippet','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('113','1665861080','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('114','1665861087','1','admin','22','7','if','Editing Snippet','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('115','1665861139','1','admin','24','10','version','Saving Snippet','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('116','1665861139','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('117','1665861167','1','admin','78','1','head','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('118','1665861184','1','admin','79','1','head','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('119','1665861184','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('120','1665861187','1','admin','78','4','footer','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('121','1665861224','1','admin','79','4','footer','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('122','1665861224','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('123','1665861236','1','admin','22','10','version','Editing Snippet','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('124','1665861275','1','admin','24','10','version','Saving Snippet','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36');

INSERT INTO `dy5r_manager_log` VALUES
  ('125','1665861275','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('126','1665861747','1','admin','16','3','Main page','Editing template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('127','1665861752','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('128','1665861756','1','admin','77','-','Новый чанк','Creating a new Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('129','1665861803','1','admin','79','-','nav_links','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('130','1665861803','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('131','1665861803','1','admin','67','-','-','Removing locks','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('132','1665861834','1','admin','20','3','Main page','Saving template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('133','1665861834','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('134','1665861850','1','admin','16','3','Main page','Editing template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('135','1665861920','1','admin','20','3','Main page','Saving template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('136','1665861920','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('137','1665861922','1','admin','16','3','Main page','Editing template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('138','1665861938','1','admin','20','3','Main page','Saving template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('139','1665861938','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('140','1665861940','1','admin','16','3','Main page','Editing template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('141','1665861986','1','admin','20','3','Main page','Saving template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('142','1665861986','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('143','1665861999','1','admin','22','10','version','Editing Snippet','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('144','1665862006','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('145','1665862008','1','admin','16','3','Main page','Editing template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('146','1665862081','1','admin','20','3','Main page','Saving template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('147','1665862081','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('148','1665862084','1','admin','16','3','Main page','Editing template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('149','1665862117','1','admin','20','3','Main page','Saving template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('150','1665862117','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('151','1665862119','1','admin','16','3','Main page','Editing template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('152','1665862159','1','admin','20','3','Main page','Saving template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('153','1665862159','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('154','1665862484','1','admin','16','3','Main page','Editing template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('155','1665862507','1','admin','20','3','Main page','Saving template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36');

INSERT INTO `dy5r_manager_log` VALUES
  ('156','1665862508','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('157','1665862622','1','admin','16','3','Main page','Editing template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('158','1665862730','1','admin','20','3','Main page','Saving template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('159','1665862730','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('160','1665862819','1','admin','16','3','Main page','Editing template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('161','1665862928','1','admin','20','3','Main page','Saving template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('162','1665862929','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('163','1665862992','1','admin','16','3','Main page','Editing template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('164','1665863014','1','admin','20','3','Main page','Saving template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('165','1665863014','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('166','1665863075','1','admin','27','1','Home LC','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('167','1665863089','1','admin','5','1','Home LC','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('168','1665863089','1','admin','3','1','Home LC','Viewing data for resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('169','1665863102','1','admin','4','-','Новый ресурс','Creating a resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('170','1665863107','1','admin','67','-','-','Removing locks','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('171','1665863111','1','admin','19','-','Новый шаблон','Creating a new template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('172','1665863114','1','admin','67','-','-','Removing locks','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('173','1665863116','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('174','1665863121','1','admin','96','3','Main page Копия','Duplicate Template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('175','1665863121','1','admin','16','4','Main page Копия','Editing template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('176','1665863198','1','admin','20','4','Service page','Saving template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('177','1665863198','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('178','1665929074','1','admin','4','-','Новый ресурс','Creating a resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('179','1665929092','1','admin','4','-','Новый ресурс','Creating a resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('180','1665929092','1','admin','67','-','-','Removing locks','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('181','1665929096','1','admin','5','-','Сервис','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('182','1665929096','1','admin','3','2','Сервис','Viewing data for resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('183','1665929096','1','admin','67','-','-','Removing locks','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('184','1665929122','1','admin','27','2','Сервис','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('185','1665929136','1','admin','5','2','Сервис','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('186','1665929136','1','admin','3','2','Сервис','Viewing data for resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36');

INSERT INTO `dy5r_manager_log` VALUES
  ('187','1665929314','1','admin','22','2','DLMenu','Editing Snippet','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('188','1665929448','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('189','1665929468','1','admin','22','6','FormLister','Editing Snippet','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('190','1665929480','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('191','1665929499','1','admin','22','5','DocLister','Editing Snippet','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('192','1665929536','1','admin','22','5','DocLister','Editing Snippet','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('193','1665929773','1','admin','112','2','Extras','Execute module','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('194','1665930977','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('195','1665930985','1','admin','16','3','Main page','Editing template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('196','1665931384','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('197','1665931677','1','admin','4','-','Новый ресурс','Creating a resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('198','1665931708','1','admin','4','-','Новый ресурс','Creating a resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('199','1665931709','1','admin','67','-','-','Removing locks','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('200','1665931716','1','admin','5','-','Models','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('201','1665931717','1','admin','3','3','Models','Viewing data for resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('202','1665931717','1','admin','67','-','-','Removing locks','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('203','1665931732','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('204','1665931742','1','admin','19','-','Новый шаблон','Creating a new template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('205','1665931763','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('206','1665931770','1','admin','16','3','Main page','Editing template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('207','1665931799','1','admin','20','-','Model','Saving template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('208','1665931799','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('209','1665931799','1','admin','67','-','-','Removing locks','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('210','1665931802','1','admin','16','5','Model','Editing template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('211','1665931936','1','admin','20','5','Model','Saving template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('212','1665931936','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('213','1665931945','1','admin','16','5','Model','Editing template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('214','1665931976','1','admin','4','-','Новый ресурс','Creating a resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('215','1665931980','1','admin','4','-','Новый ресурс','Creating a resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('216','1665931980','1','admin','67','-','-','Removing locks','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('217','1665931988','1','admin','5','-','Soul','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36');

INSERT INTO `dy5r_manager_log` VALUES
  ('218','1665931988','1','admin','3','4','Soul','Viewing data for resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('219','1665931988','1','admin','67','-','-','Removing locks','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('220','1665931999','1','admin','4','-','Новый ресурс','Creating a resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('221','1665932005','1','admin','5','-','Sportage','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('222','1665932006','1','admin','3','5','Sportage','Viewing data for resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('223','1665932006','1','admin','67','-','-','Removing locks','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('224','1665932025','1','admin','4','-','Новый ресурс','Creating a resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('225','1665932045','1','admin','5','-','Rio','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('226','1665932045','1','admin','3','6','Rio','Viewing data for resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('227','1665932045','1','admin','67','-','-','Removing locks','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('228','1665932118','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('229','1665932121','1','admin','16','3','Main page','Editing template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('230','1665932151','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('231','1665932159','1','admin','16','5','Model','Editing template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('232','1665932236','1','admin','20','5','Model','Saving template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('233','1665932236','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('234','1665932238','1','admin','16','5','Model','Editing template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('235','1665932342','1','admin','20','3','Main page','Saving template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('236','1665932342','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('237','1665932367','1','admin','16','3','Main page','Editing template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('238','1665942467','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('239','1665942922','1','admin','16','3','Main page','Editing template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('240','1665942970','1','admin','20','3','Main page','Saving template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('241','1665942970','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('242','1665942989','1','admin','16','3','Main page','Editing template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('243','1665943024','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('244','1665943026','1','admin','16','5','Model','Editing template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('245','1665943036','1','admin','27','5','Sportage','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('246','1665943042','1','admin','27','5','Sportage','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('247','1665943044','1','admin','5','5','Sportage','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('248','1665943044','1','admin','3','5','Sportage','Viewing data for resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36');

INSERT INTO `dy5r_manager_log` VALUES
  ('249','1665943045','1','admin','27','6','Rio','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('250','1665943051','1','admin','27','6','Rio','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('251','1665943053','1','admin','27','4','Soul','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('252','1665943057','1','admin','27','4','Soul','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('253','1665943109','1','admin','20','5','Model','Saving template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('254','1665943109','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('255','1665943144','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('256','1665943159','1','admin','20','3','Main page','Saving template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('257','1665943159','1','admin','16','3','Main page','Editing template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('258','1665943267','1','admin','20','3','Main page','Saving template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('259','1665943267','1','admin','16','3','Main page','Editing template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('260','1665943473','1','admin','20','3','Main page','Saving template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('261','1665943473','1','admin','16','3','Main page','Editing template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('262','1665943488','1','admin','27','5','Sportage','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('263','1665943493','1','admin','27','5','Sportage','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('264','1665943496','1','admin','5','5','Sportage','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('265','1665943496','1','admin','27','5','Sportage','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('266','1665943505','1','admin','27','6','Rio','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('267','1665943509','1','admin','27','4','Soul','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('268','1665943527','1','admin','20','3','Main page','Saving template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('269','1665943528','1','admin','16','3','Main page','Editing template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('270','1665943600','1','admin','20','3','Main page','Saving template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('271','1665943600','1','admin','16','3','Main page','Editing template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('272','1665943626','1','admin','16','5','Model','Editing template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('273','1665943745','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('274','1665943754','1','admin','77','-','Новый чанк','Creating a new Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('275','1665943770','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('276','1665943776','1','admin','16','5','Model','Editing template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('277','1665943782','1','admin','20','5','Model','Saving template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('278','1665943782','1','admin','16','5','Model','Editing template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('279','1665943790','1','admin','79','-','model_item','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36');

INSERT INTO `dy5r_manager_log` VALUES
  ('280','1665943790','1','admin','78','6','model_item','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('281','1665943817','1','admin','20','3','Main page','Saving template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('282','1665943817','1','admin','16','3','Main page','Editing template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('283','1665943855','1','admin','20','3','Main page','Saving template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('284','1665943855','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('285','1665943870','1','admin','27','5','Sportage','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('286','1665943878','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('287','1665943880','1','admin','16','5','Model','Editing template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('288','1665943920','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('289','1665943927','1','admin','300','-','Новый параметр (TV)','Create Template Variable','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('290','1665943958','1','admin','67','-','-','Removing locks','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('291','1665944444','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('292','1665944450','1','admin','300','-','Новый параметр (TV)','Create Template Variable','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('293','1665944600','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('294','1665944714','1','admin','302','-','Model image','Save Template Variable','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('295','1665944714','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('296','1665944714','1','admin','67','-','-','Removing locks','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('297','1665944714','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('298','1665944730','1','admin','27','5','Sportage','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('299','1665944774','1','admin','5','5','Sportage','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('300','1665944774','1','admin','3','5','Sportage','Viewing data for resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('301','1665944819','1','admin','27','5','Sportage','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('302','1665944834','1','admin','5','5','Sportage','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('303','1665944834','1','admin','3','5','Sportage','Viewing data for resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('304','1665944836','1','admin','27','6','Rio','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('305','1665944863','1','admin','5','6','Rio','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('306','1665944863','1','admin','3','6','Rio','Viewing data for resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('307','1665944865','1','admin','27','4','Soul','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('308','1665944893','1','admin','5','4','Soul','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('309','1665944893','1','admin','3','4','Soul','Viewing data for resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('310','1665944898','1','admin','27','5','Sportage','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36');

INSERT INTO `dy5r_manager_log` VALUES
  ('311','1665944906','1','admin','5','5','Sportage','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('312','1665944906','1','admin','3','5','Sportage','Viewing data for resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('313','1665944948','1','admin','79','6','model_item','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('314','1665944948','1','admin','78','6','model_item','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('315','1665944984','1','admin','79','6','model_item','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('316','1665944984','1','admin','78','6','model_item','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('317','1665945004','1','admin','27','5','Sportage','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('318','1665945077','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('319','1665945086','1','admin','16','3','Main page','Editing template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('320','1665945146','1','admin','79','6','model_item','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('321','1665945146','1','admin','78','6','model_item','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('322','1665945168','1','admin','20','3','Main page','Saving template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('323','1665945168','1','admin','16','3','Main page','Editing template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('324','1665945237','1','admin','79','6','model_item','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('325','1665945237','1','admin','78','6','model_item','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('326','1665945265','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('327','1665945325','1','admin','79','6','model_item','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('328','1665945326','1','admin','78','6','model_item','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('329','1665945429','1','admin','79','6','model_item','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('330','1665945429','1','admin','78','6','model_item','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('331','1665945503','1','admin','20','3','Main page','Saving template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('332','1665945503','1','admin','16','3','Main page','Editing template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('333','1665945517','1','admin','5','5','Sportage','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('334','1665945517','1','admin','27','5','Sportage','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('335','1665945623','1','admin','300','-','Новый параметр (TV)','Create Template Variable','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('336','1665945716','1','admin','302','-','Model benefit','Save Template Variable','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('337','1665945716','1','admin','301','6','Model benefit','Edit Template Variable','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('338','1665945719','1','admin','5','5','Sportage','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('339','1665945719','1','admin','27','5','Sportage','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('340','1665945735','1','admin','302','6','Model benefit','Save Template Variable','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('341','1665945735','1','admin','301','6','Model benefit','Edit Template Variable','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36');

INSERT INTO `dy5r_manager_log` VALUES
  ('342','1665945746','1','admin','5','5','Sportage','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('343','1665945746','1','admin','27','5','Sportage','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('344','1665946084','1','admin','112','2','Extras','Execute module','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('345','1665946139','1','admin','302','6','Model benefit','Save Template Variable','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('346','1665946139','1','admin','301','6','Model benefit','Edit Template Variable','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('347','1665946150','1','admin','302','6','Model benefit','Save Template Variable','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('348','1665946151','1','admin','301','6','Model benefit','Edit Template Variable','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('349','1665946154','1','admin','5','5','Sportage','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('350','1665946155','1','admin','27','5','Sportage','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('351','1665946277','1','admin','5','5','Sportage','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('352','1665946278','1','admin','27','5','Sportage','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('353','1665946306','1','admin','20','3','Main page','Saving template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('354','1665946306','1','admin','16','3','Main page','Editing template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('355','1665946349','1','admin','79','6','model_item','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('356','1665946349','1','admin','78','6','model_item','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('357','1665946378','1','admin','79','6','model_item','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('358','1665946378','1','admin','78','6','model_item','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('359','1665946673','1','admin','79','6','model_item','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('360','1665946673','1','admin','78','6','model_item','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('361','1665946743','1','admin','79','6','model_item','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('362','1665946743','1','admin','78','6','model_item','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('363','1665946798','1','admin','79','6','model_item','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('364','1665946798','1','admin','78','6','model_item','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('365','1665946816','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('366','1665946820','1','admin','22','11','multiTV','Editing Snippet','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('367','1665947162','1','admin','79','6','model_item','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('368','1665947162','1','admin','78','6','model_item','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('369','1665947354','1','admin','79','6','model_item','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('370','1665947355','1','admin','78','6','model_item','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('371','1665947390','1','admin','79','6','model_item','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('372','1665947390','1','admin','78','6','model_item','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36');

INSERT INTO `dy5r_manager_log` VALUES
  ('373','1665947676','1','admin','79','6','model_item','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('374','1665947676','1','admin','78','6','model_item','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('375','1665947913','1','admin','79','6','model_item','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('376','1665947913','1','admin','78','6','model_item','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('377','1665948100','1','admin','302','6','Model benefit','Save Template Variable','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('378','1665948100','1','admin','301','6','Model benefit','Edit Template Variable','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('379','1665948118','1','admin','302','6','Model benefit','Save Template Variable','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('380','1665948118','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('381','1665948135','1','admin','5','5','Sportage','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('382','1665948136','1','admin','27','5','Sportage','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('383','1665948157','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('384','1665948166','1','admin','301','6','Model benefit','Edit Template Variable','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('385','1665948175','1','admin','302','6','Model benefit','Save Template Variable','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('386','1665948176','1','admin','301','6','Model benefit','Edit Template Variable','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('387','1665948293','1','admin','79','6','model_item','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('388','1665948293','1','admin','78','6','model_item','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('389','1665948297','1','admin','5','5','Sportage','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('390','1665948297','1','admin','27','5','Sportage','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('391','1665948379','1','admin','79','6','model_item','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('392','1665948379','1','admin','78','6','model_item','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('393','1665948394','1','admin','27','5','Sportage','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('394','1665948397','1','admin','27','6','Rio','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('395','1665948415','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('396','1665948418','1','admin','301','6','Model benefit','Edit Template Variable','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('397','1665948424','1','admin','302','6','Model benefit','Save Template Variable','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('398','1665948424','1','admin','301','6','Model benefit','Edit Template Variable','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('399','1665948426','1','admin','27','5','Sportage','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('400','1665948434','1','admin','302','6','Model benefit','Save Template Variable','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('401','1665948434','1','admin','301','6','Model benefit','Edit Template Variable','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('402','1665948439','1','admin','5','5','Sportage','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('403','1665948439','1','admin','27','5','Sportage','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36');

INSERT INTO `dy5r_manager_log` VALUES
  ('404','1665948487','1','admin','302','6','Model benefit','Save Template Variable','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('405','1665948487','1','admin','301','6','Model benefit','Edit Template Variable','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('406','1665948492','1','admin','5','5','Sportage','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('407','1665948493','1','admin','27','5','Sportage','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('408','1665948533','1','admin','79','6','model_item','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('409','1665948533','1','admin','78','6','model_item','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('410','1665948556','1','admin','79','6','model_item','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('411','1665948556','1','admin','78','6','model_item','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('412','1665948560','1','admin','5','5','Sportage','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('413','1665948560','1','admin','27','5','Sportage','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('414','1665948569','1','admin','5','5','Sportage','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('415','1665948570','1','admin','27','5','Sportage','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('416','1665948614','1','admin','302','6','Model benefit','Save Template Variable','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('417','1665948614','1','admin','301','6','Model benefit','Edit Template Variable','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('418','1665948616','1','admin','27','5','Sportage','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('419','1665948631','1','admin','302','6','Model benefit','Save Template Variable','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('420','1665948631','1','admin','301','6','Model benefit','Edit Template Variable','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('421','1665948636','1','admin','27','5','Sportage','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('422','1665948682','1','admin','5','5','Sportage','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('423','1665948682','1','admin','27','5','Sportage','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('424','1665948772','1','admin','302','6','Model benefit','Save Template Variable','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('425','1665948772','1','admin','301','6','Model benefit','Edit Template Variable','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('426','1665948774','1','admin','5','5','Sportage','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('427','1665948775','1','admin','27','5','Sportage','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('428','1665948782','1','admin','302','6','Model benefit','Save Template Variable','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('429','1665948782','1','admin','301','6','Model benefit','Edit Template Variable','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('430','1665948784','1','admin','5','5','Sportage','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('431','1665948784','1','admin','27','5','Sportage','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('432','1665948859','1','admin','5','5','Sportage','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('433','1665948859','1','admin','27','5','Sportage','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('434','1665948887','1','admin','5','5','Sportage','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36');

INSERT INTO `dy5r_manager_log` VALUES
  ('435','1665948887','1','admin','27','5','Sportage','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('436','1665948941','1','admin','79','6','model_item','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('437','1665948941','1','admin','78','6','model_item','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('438','1665949126','1','admin','79','6','model_item','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('439','1665949126','1','admin','78','6','model_item','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('440','1665949167','1','admin','79','6','model_item','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('441','1665949167','1','admin','78','6','model_item','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('442','1665949245','1','admin','79','6','model_item','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('443','1665949245','1','admin','78','6','model_item','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('444','1665949382','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('445','1665949386','1','admin','22','10','version','Editing Snippet','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('446','1665949541','1','admin','24','10','version','Saving Snippet','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('447','1665949542','1','admin','22','10','version','Editing Snippet','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('448','1665949617','1','admin','79','6','model_item','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('449','1665949617','1','admin','78','6','model_item','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('450','1665949624','1','admin','27','5','Sportage','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('451','1665949750','1','admin','27','3','Models','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('452','1665949760','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('453','1665949766','1','admin','16','3','Main page','Editing template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('454','1665949810','1','admin','20','3','Main page','Saving template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('455','1665949810','1','admin','16','3','Main page','Editing template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('456','1665949842','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('457','1665949849','1','admin','78','5','nav_links','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('458','1665949894','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('459','1665949897','1','admin','78','6','model_item','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('460','1665949907','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('461','1665949910','1','admin','77','-','Новый чанк','Creating a new Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('462','1665949945','1','admin','79','5','nav_links','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('463','1665949945','1','admin','78','5','nav_links','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('464','1665949993','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('465','1665949995','1','admin','77','-','Новый чанк','Creating a new Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36');

INSERT INTO `dy5r_manager_log` VALUES
  ('466','1665949995','1','admin','67','-','-','Removing locks','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('467','1665950055','1','admin','79','-','models_nav','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('468','1665950055','1','admin','78','7','models_nav','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('469','1665950058','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('470','1665950060','1','admin','77','-','Новый чанк','Creating a new Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('471','1665950149','1','admin','79','-','models_nav_item','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('472','1665950149','1','admin','78','8','models_nav_item','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('473','1665950174','1','admin','79','7','models_nav','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('474','1665950174','1','admin','78','7','models_nav','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('475','1665950201','1','admin','20','3','Main page','Saving template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('476','1665950201','1','admin','16','3','Main page','Editing template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('477','1665950311','1','admin','20','3','Main page','Saving template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('478','1665950311','1','admin','16','3','Main page','Editing template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('479','1665950313','1','admin','27','1','Home LC','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('480','1665950362','1','admin','5','1','Home LC','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('481','1665950362','1','admin','27','1','Home LC','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('482','1665950379','1','admin','5','1','Home LC','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('483','1665950379','1','admin','27','1','Home LC','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('484','1665950401','1','admin','27','1','Home LC','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('485','1665950411','1','admin','5','1','Home LC','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('486','1665950411','1','admin','27','1','Home LC','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('487','1665950483','1','admin','20','3','Main page','Saving template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('488','1665950483','1','admin','16','3','Main page','Editing template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('489','1665950492','1','admin','79','6','model_item','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('490','1665950492','1','admin','78','6','model_item','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('491','1665950546','1','admin','5','1','Home LC','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('492','1665950547','1','admin','27','1','Home LC','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('493','1665950656','1','admin','27','1','Home LC','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('494','1665950696','1','admin','5','1','Main page','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('495','1665950696','1','admin','27','1','Main page','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('496','1665950706','1','admin','5','1','Main page','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36');

INSERT INTO `dy5r_manager_log` VALUES
  ('497','1665950706','1','admin','27','1','Main page','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('498','1665950710','1','admin','5','1','Main page','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('499','1665950711','1','admin','27','1','Main page','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('500','1665994299','1','admin','27','6','Rio','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('501','1665994440','1','admin','5','6','Rio','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('502','1665994441','1','admin','27','6','Rio','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('503','1665994470','1','admin','5','6','Rio','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('504','1665994470','1','admin','27','6','Rio','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('505','1665994474','1','admin','27','4','Soul','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('506','1665994549','1','admin','5','4','Soul','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('507','1665994549','1','admin','27','4','Soul','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('508','1665994579','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('509','1665994586','1','admin','16','3','Main page','Editing template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('510','1665994597','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('511','1665994601','1','admin','78','5','nav_links','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('512','1665994613','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('513','1665994616','1','admin','78','8','models_nav_item','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('514','1665994621','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('515','1665994624','1','admin','78','7','models_nav','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('516','1665994657','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('517','1665994664','1','admin','78','6','model_item','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('518','1665995125','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('519','1665995129','1','admin','77','-','Новый чанк','Creating a new Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('520','1665995151','1','admin','79','-','timer_form','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('521','1665995151','1','admin','78','9','timer_form','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('522','1665995168','1','admin','79','9','timer_form','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('523','1665995168','1','admin','78','9','timer_form','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('524','1665995191','1','admin','20','3','Main page','Saving template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('525','1665995191','1','admin','16','3','Main page','Editing template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('526','1665995215','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('527','1665995218','1','admin','77','-','Новый чанк','Creating a new Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36');

INSERT INTO `dy5r_manager_log` VALUES
  ('528','1665995238','1','admin','79','-','main_slider','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('529','1665995238','1','admin','78','10','main_slider','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('530','1665995303','1','admin','20','3','Main page','Saving template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('531','1665995303','1','admin','16','3','Main page','Editing template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('532','1665995307','1','admin','79','10','main_slider','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('533','1665995307','1','admin','78','10','main_slider','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('534','1665995335','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('535','1665995345','1','admin','16','5','Model','Editing template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('536','1665995350','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('537','1665995357','1','admin','78','6','model_item','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('538','1665995417','1','admin','79','6','model_item','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('539','1665995418','1','admin','78','6','model_item','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('540','1665995440','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('541','1665995444','1','admin','16','3','Main page','Editing template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('542','1665995616','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('543','1665995621','1','admin','78','6','model_item','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('544','1665995627','1','admin','79','6','model_item','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('545','1665995628','1','admin','78','6','model_item','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('546','1665997605','1','admin','79','6','model_item','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('547','1665997605','1','admin','78','6','model_item','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('548','1665997621','1','admin','79','6','model_item','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('549','1665997621','1','admin','78','6','model_item','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('550','1665997647','1','admin','79','6','model_item','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('551','1665997647','1','admin','78','6','model_item','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('552','1665997922','1','admin','79','6','model_item','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('553','1665997922','1','admin','78','6','model_item','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('554','1665998062','1','admin','79','6','model_item','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('555','1665998062','1','admin','78','6','model_item','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('556','1665998079','1','admin','79','6','model_item','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('557','1665998079','1','admin','78','6','model_item','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('558','1665998288','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36');

INSERT INTO `dy5r_manager_log` VALUES
  ('559','1665998292','1','admin','22','5','DocLister','Editing Snippet','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('560','1665998347','1','admin','79','6','model_item','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('561','1665998348','1','admin','78','6','model_item','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('562','1665998443','1','admin','79','6','model_item','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('563','1665998443','1','admin','78','6','model_item','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('564','1665998663','1','admin','79','6','model_item','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('565','1665998664','1','admin','78','6','model_item','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('566','1665998686','1','admin','79','6','model_item','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('567','1665998686','1','admin','78','6','model_item','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('568','1665999233','1','admin','27','5','Sportage','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('569','1665999287','1','admin','20','3','Main page','Saving template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('570','1665999287','1','admin','16','3','Main page','Editing template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('571','1665999340','1','admin','79','6','model_item','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('572','1665999340','1','admin','78','6','model_item','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('573','1665999369','1','admin','20','3','Main page','Saving template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('574','1665999369','1','admin','16','3','Main page','Editing template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('575','1665999944','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('576','1665999949','1','admin','78','10','main_slider','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('577','1665999972','1','admin','4','-','Новый ресурс','Creating a resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('578','1665999987','1','admin','4','-','Новый ресурс','Creating a resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('579','1665999987','1','admin','67','-','-','Removing locks','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('580','1665999994','1','admin','5','-','Slider','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('581','1665999994','1','admin','3','7','Slider','Viewing data for resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('582','1665999994','1','admin','67','-','-','Removing locks','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('583','1666000000','1','admin','4','-','Новый ресурс','Creating a resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('584','1666000058','1','admin','4','-','Новый ресурс','Creating a resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('585','1666000058','1','admin','67','-','-','Removing locks','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('586','1666000064','1','admin','5','-','Максимальные выгоды','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('587','1666000064','1','admin','3','8','Максимальные выгоды','Viewing data for resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('588','1666000065','1','admin','67','-','-','Removing locks','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('589','1666000089','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36');

INSERT INTO `dy5r_manager_log` VALUES
  ('590','1666000095','1','admin','77','-','Новый чанк','Creating a new Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('591','1666000149','1','admin','79','-','slider_item','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('592','1666000149','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('593','1666000149','1','admin','67','-','-','Removing locks','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('594','1666000164','1','admin','16','3','Main page','Editing template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('595','1666000200','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('596','1666000210','1','admin','78','11','slider_item','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('597','1666000296','1','admin','79','10','main_slider','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('598','1666000296','1','admin','78','10','main_slider','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('599','1666000356','1','admin','79','11','slider_item','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('600','1666000356','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('601','1666000366','1','admin','27','8','Максимальные выгоды','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('602','1666000378','1','admin','5','8','88 Максимальные выгоды','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('603','1666000378','1','admin','3','8','88 Максимальные выгоды','Viewing data for resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('604','1666000410','1','admin','300','-','Новый параметр (TV)','Create Template Variable','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('605','1666000479','1','admin','302','-','Image','Save Template Variable','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('606','1666000479','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('607','1666000479','1','admin','67','-','-','Removing locks','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('608','1666000483','1','admin','300','-','Новый параметр (TV)','Create Template Variable','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('609','1666000526','1','admin','302','-','Image mobile version','Save Template Variable','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('610','1666000526','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('611','1666000526','1','admin','67','-','-','Removing locks','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('612','1666000530','1','admin','301','8','Image mobile version','Edit Template Variable','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('613','1666000534','1','admin','302','8','Image mobile version','Save Template Variable','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('614','1666000534','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('615','1666000554','1','admin','16','5','Model','Editing template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('616','1666000564','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('617','1666000566','1','admin','19','-','Новый шаблон','Creating a new template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('618','1666000594','1','admin','20','-','banner','Saving template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('619','1666000594','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('620','1666000594','1','admin','67','-','-','Removing locks','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36');

INSERT INTO `dy5r_manager_log` VALUES
  ('621','1666000597','1','admin','27','8','88 Максимальные выгоды','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('622','1666000601','1','admin','27','8','88 Максимальные выгоды','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('623','1666000607','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('624','1666000613','1','admin','16','4','Service page','Editing template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('625','1666000621','1','admin','20','4','Service page','Saving template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('626','1666000621','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('627','1666000625','1','admin','5','8','88 Максимальные выгоды','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('628','1666000625','1','admin','3','8','88 Максимальные выгоды','Viewing data for resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('629','1666000628','1','admin','27','8','88 Максимальные выгоды','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('630','1666000639','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('631','1666000644','1','admin','301','7','Image','Edit Template Variable','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('632','1666000654','1','admin','302','7','Image','Save Template Variable','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('633','1666000654','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('634','1666000657','1','admin','301','8','Image mobile version','Edit Template Variable','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('635','1666000662','1','admin','302','8','Image mobile version','Save Template Variable','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('636','1666000662','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('637','1666000670','1','admin','27','8','88 Максимальные выгоды','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('638','1666000687','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('639','1666000691','1','admin','78','11','slider_item','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('640','1666000738','1','admin','79','11','slider_item','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('641','1666000738','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('642','1666000761','1','admin','5','8','88 Максимальные выгоды','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('643','1666000761','1','admin','3','8','88 Максимальные выгоды','Viewing data for resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('644','1666000784','1','admin','27','8','88 Максимальные выгоды','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('645','1666000792','1','admin','5','8','88 Максимальные выгоды','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('646','1666000792','1','admin','3','8','88 Максимальные выгоды','Viewing data for resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('647','1666000825','1','admin','78','11','slider_item','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('648','1666000844','1','admin','79','11','slider_item','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('649','1666000844','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('650','1666000855','1','admin','78','11','slider_item','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('651','1666000865','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36');

INSERT INTO `dy5r_manager_log` VALUES
  ('652','1666000869','1','admin','78','6','model_item','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('653','1666000892','1','admin','79','11','slider_item','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('654','1666000892','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('655','1666000917','1','admin','27','8','88 Максимальные выгоды','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('656','1666000945','1','admin','5','8','Максимальные выгоды','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('657','1666000945','1','admin','3','8','Максимальные выгоды','Viewing data for resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('658','1666000967','1','admin','4','-','Новый ресурс','Creating a resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('659','1666001027','1','admin','5','-','Счастливый тест драйв с 10.10.22 по 11.11.22','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('660','1666001027','1','admin','3','9','Счастливый тест драйв с 10.10.22 по 11.11.22','Viewing data for resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('661','1666001027','1','admin','67','-','-','Removing locks','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('662','1666001065','1','admin','79','10','main_slider','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('663','1666001065','1','admin','78','10','main_slider','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('664','1666001164','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('665','1666001173','1','admin','78','10','main_slider','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('666','1666001205','1','admin','4','-','Новый ресурс','Creating a resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('667','1666001325','1','admin','5','-','Месяц подарков','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('668','1666001325','1','admin','27','10','Месяц подарков','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('669','1666001377','1','admin','79','10','main_slider','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('670','1666001377','1','admin','78','10','main_slider','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('671','1666001394','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('672','1666001406','1','admin','96','6','banner Копия','Duplicate Template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('673','1666001406','1','admin','16','7','banner Копия','Editing template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('674','1666001426','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('675','1666001428','1','admin','16','6','banner','Editing template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('676','1666001447','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('677','1666001453','1','admin','21','7','banner Копия','Deleting template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('678','1666001453','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('679','1666001462','1','admin','78','11','slider_item','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('680','1666001474','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('681','1666001478','1','admin','78','10','main_slider','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('682','1666001496','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36');

INSERT INTO `dy5r_manager_log` VALUES
  ('683','1666001500','1','admin','300','-','Новый параметр (TV)','Create Template Variable','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('684','1666001564','1','admin','302','-','Black text on banner','Save Template Variable','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('685','1666001564','1','admin','301','9','Black text on banner','Edit Template Variable','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('686','1666001578','1','admin','5','10','Месяц подарков','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('687','1666001579','1','admin','27','10','Месяц подарков','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('688','1666001587','1','admin','27','9','Счастливый тест драйв с 10.10.22 по 11.11.22','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('689','1666001592','1','admin','5','9','Счастливый тест драйв с 10.10.22 по 11.11.22','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('690','1666001592','1','admin','27','9','Счастливый тест драйв с 10.10.22 по 11.11.22','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('691','1666001595','1','admin','27','8','Максимальные выгоды','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('692','1666001602','1','admin','5','8','Максимальные выгоды','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('693','1666001602','1','admin','27','8','Максимальные выгоды','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('694','1666001753','1','admin','5','9','Счастливый тест драйв с 10.10.22 по 11.11.22','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('695','1666001753','1','admin','27','9','Счастливый тест драйв с 10.10.22 по 11.11.22','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('696','1666001832','1','admin','5','9','Счастливый тест драйв с 10.10.22 по 11.11.22','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('697','1666001832','1','admin','27','9','Счастливый тест драйв с 10.10.22 по 11.11.22','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('698','1666001838','1','admin','27','9','Счастливый тест драйв с 10.10.22 по 11.11.22','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('699','1666001978','1','admin','5','10','Месяц подарков','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('700','1666001978','1','admin','27','10','Месяц подарков','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('701','1666002024','1','admin','79','11','slider_item','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('702','1666002024','1','admin','78','11','slider_item','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('703','1666002126','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('704','1666002137','1','admin','301','9','Black text on banner','Edit Template Variable','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('705','1666002153','1','admin','79','10','main_slider','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('706','1666002153','1','admin','78','10','main_slider','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('707','1666002212','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('708','1666002217','1','admin','16','6','banner','Editing template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('709','1666002221','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('710','1666002226','1','admin','78','10','main_slider','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('711','1666002240','1','admin','79','11','slider_item','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('712','1666002240','1','admin','78','11','slider_item','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('713','1666002299','1','admin','79','11','slider_item','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36');

INSERT INTO `dy5r_manager_log` VALUES
  ('714','1666002300','1','admin','78','11','slider_item','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('715','1666002334','1','admin','79','11','slider_item','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('716','1666002334','1','admin','78','11','slider_item','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('717','1666002391','1','admin','79','11','slider_item','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('718','1666002391','1','admin','78','11','slider_item','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('719','1666002433','1','admin','79','10','main_slider','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('720','1666002433','1','admin','78','10','main_slider','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('721','1666002445','1','admin','27','9','Счастливый тест драйв с 10.10.22 по 11.11.22','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('722','1666002460','1','admin','5','9','Счастливый тест драйв с 10.10.22 по 11.11.22','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('723','1666002461','1','admin','27','9','Счастливый тест драйв с 10.10.22 по 11.11.22','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('724','1666002465','1','admin','5','9','Счастливый тест драйв с 10.10.22 по 11.11.22','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('725','1666002466','1','admin','27','9','Счастливый тест драйв с 10.10.22 по 11.11.22','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('726','1666002469','1','admin','27','10','Месяц подарков','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('727','1666002473','1','admin','27','8','Максимальные выгоды','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('728','1666002481','1','admin','5','8','Максимальные выгоды','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('729','1666002482','1','admin','27','8','Максимальные выгоды','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('730','1666002498','1','admin','79','11','slider_item','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('731','1666002498','1','admin','78','11','slider_item','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('732','1666002520','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('733','1666002528','1','admin','301','9','Black text on banner','Edit Template Variable','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('734','1666002663','1','admin','302','9','Black text on banner','Save Template Variable','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('735','1666002663','1','admin','301','9','Black text on banner','Edit Template Variable','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('736','1666002677','1','admin','79','11','slider_item','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('737','1666002677','1','admin','78','11','slider_item','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('738','1666002699','1','admin','27','9','Счастливый тест драйв с 10.10.22 по 11.11.22','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('739','1666002721','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('740','1666002724','1','admin','301','9','Black text on banner','Edit Template Variable','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('741','1666002729','1','admin','302','9','Black text on banner','Save Template Variable','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('742','1666002730','1','admin','301','9','Black text on banner','Edit Template Variable','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('743','1666002733','1','admin','27','9','Счастливый тест драйв с 10.10.22 по 11.11.22','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('744','1666002741','1','admin','5','9','Счастливый тест драйв с 10.10.22 по 11.11.22','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36');

INSERT INTO `dy5r_manager_log` VALUES
  ('745','1666002741','1','admin','27','9','Счастливый тест драйв с 10.10.22 по 11.11.22','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('746','1666002744','1','admin','27','10','Месяц подарков','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('747','1666002758','1','admin','5','10','Месяц подарков','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('748','1666002758','1','admin','27','10','Месяц подарков','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('749','1666002759','1','admin','27','8','Максимальные выгоды','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('750','1666002766','1','admin','5','8','Максимальные выгоды','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('751','1666002766','1','admin','27','8','Максимальные выгоды','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('752','1666002772','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('753','1666002779','1','admin','16','6','banner','Editing template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('754','1666002784','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('755','1666002787','1','admin','78','10','main_slider','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('756','1666002795','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('757','1666002797','1','admin','78','11','slider_item','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('758','1666002805','1','admin','79','11','slider_item','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('759','1666002805','1','admin','78','11','slider_item','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('760','1666002838','1','admin','79','11','slider_item','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('761','1666002838','1','admin','78','11','slider_item','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('762','1666002866','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('763','1666002881','1','admin','301','9','Black text on banner','Edit Template Variable','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('764','1666002927','1','admin','302','9','Black text on banner','Save Template Variable','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('765','1666002927','1','admin','301','9','Black text on banner','Edit Template Variable','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('766','1666002931','1','admin','27','9','Счастливый тест драйв с 10.10.22 по 11.11.22','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('767','1666002982','1','admin','302','9','Black text on banner','Save Template Variable','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('768','1666002982','1','admin','301','9','Black text on banner','Edit Template Variable','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('769','1666002985','1','admin','27','9','Счастливый тест драйв с 10.10.22 по 11.11.22','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('770','1666002991','1','admin','5','9','Счастливый тест драйв с 10.10.22 по 11.11.22','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('771','1666002992','1','admin','27','9','Счастливый тест драйв с 10.10.22 по 11.11.22','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('772','1666002997','1','admin','5','9','Счастливый тест драйв с 10.10.22 по 11.11.22','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('773','1666002997','1','admin','27','9','Счастливый тест драйв с 10.10.22 по 11.11.22','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('774','1666003000','1','admin','27','10','Месяц подарков','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('775','1666003007','1','admin','5','10','Месяц подарков','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36');

INSERT INTO `dy5r_manager_log` VALUES
  ('776','1666003007','1','admin','27','10','Месяц подарков','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('777','1666003009','1','admin','27','8','Максимальные выгоды','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('778','1666003013','1','admin','5','8','Максимальные выгоды','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('779','1666003013','1','admin','27','8','Максимальные выгоды','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('780','1666003039','1','admin','79','11','slider_item','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('781','1666003039','1','admin','78','11','slider_item','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('782','1666003061','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('783','1666003065','1','admin','301','9','Black text on banner','Edit Template Variable','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('784','1666003125','1','admin','302','9','Black text on banner','Save Template Variable','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('785','1666003125','1','admin','301','9','Black text on banner','Edit Template Variable','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('786','1666003129','1','admin','27','9','Счастливый тест драйв с 10.10.22 по 11.11.22','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('787','1666003136','1','admin','5','9','Счастливый тест драйв с 10.10.22 по 11.11.22','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('788','1666003137','1','admin','27','9','Счастливый тест драйв с 10.10.22 по 11.11.22','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('789','1666003186','1','admin','302','9','Black text on banner','Save Template Variable','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('790','1666003186','1','admin','301','9','Black text on banner','Edit Template Variable','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('791','1666003193','1','admin','27','9','Счастливый тест драйв с 10.10.22 по 11.11.22','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('792','1666003209','1','admin','5','9','Счастливый тест драйв с 10.10.22 по 11.11.22','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('793','1666003209','1','admin','27','9','Счастливый тест драйв с 10.10.22 по 11.11.22','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('794','1666003211','1','admin','27','10','Месяц подарков','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('795','1666003216','1','admin','5','10','Месяц подарков','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('796','1666003216','1','admin','27','10','Месяц подарков','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('797','1666003218','1','admin','27','8','Максимальные выгоды','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('798','1666003224','1','admin','5','8','Максимальные выгоды','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('799','1666003224','1','admin','27','8','Максимальные выгоды','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('800','1666003286','1','admin','79','11','slider_item','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('801','1666003286','1','admin','78','11','slider_item','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('802','1666003301','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('803','1666003318','1','admin','78','10','main_slider','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('804','1666003326','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('805','1666003330','1','admin','16','6','banner','Editing template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('806','1666003333','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36');

INSERT INTO `dy5r_manager_log` VALUES
  ('807','1666003338','1','admin','78','10','main_slider','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('808','1666003360','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('809','1666003372','1','admin','78','11','slider_item','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('810','1666003389','1','admin','79','11','slider_item','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('811','1666003389','1','admin','78','11','slider_item','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('812','1666003405','1','admin','79','11','slider_item','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('813','1666003405','1','admin','78','11','slider_item','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('814','1666003485','1','admin','27','9','Счастливый тест драйв с 10.10.22 по 11.11.22','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('815','1666003494','1','admin','5','9','Счастливый тест драйв с 10.10.22 по 11.11.22','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('816','1666003494','1','admin','27','9','Счастливый тест драйв с 10.10.22 по 11.11.22','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('817','1666003496','1','admin','27','10','Месяц подарков','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('818','1666003499','1','admin','5','10','Месяц подарков','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('819','1666003499','1','admin','27','10','Месяц подарков','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('820','1666003525','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('821','1666003528','1','admin','78','10','main_slider','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('822','1666003705','1','admin','27','9','Счастливый тест драйв с 10.10.22 по 11.11.22','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('823','1666003707','1','admin','27','8','Максимальные выгоды','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('824','1666003715','1','admin','5','8','Максимальные выгоды','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('825','1666003715','1','admin','27','8','Максимальные выгоды','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('826','1666003721','1','admin','5','9','Счастливый тест драйв с 10.10.22 по 11.11.22','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('827','1666003721','1','admin','27','9','Счастливый тест драйв с 10.10.22 по 11.11.22','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('828','1666003726','1','admin','27','8','Максимальные выгоды','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('829','1666003732','1','admin','5','8','Максимальные выгоды','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('830','1666003732','1','admin','27','8','Максимальные выгоды','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('831','1666003744','1','admin','27','9','Счастливый тест драйв с 10.10.22 по 11.11.22','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('832','1666003746','1','admin','27','10','Месяц подарков','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('833','1666003908','1','admin','79','10','main_slider','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('834','1666003908','1','admin','78','10','main_slider','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('835','1666004211','1','admin','79','10','main_slider','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('836','1666004211','1','admin','78','10','main_slider','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('837','1666005460','1','admin','27','1','Main page','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36');

INSERT INTO `dy5r_manager_log` VALUES
  ('838','1666005483','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('839','1666005493','1','admin','17','-','-','Editing settings','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('840','1666005658','1','admin','16','3','Main page','Editing template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('841','1666005750','1','admin','20','3','Main page','Saving template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('842','1666005751','1','admin','16','3','Main page','Editing template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('843','1666005752','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('844','1666005757','1','admin','77','-','Новый чанк','Creating a new Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('845','1666005789','1','admin','79','-','stock','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('846','1666005789','1','admin','78','12','stock','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('847','1666006191','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('848','1666006192','1','admin','77','-','Новый чанк','Creating a new Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('849','1666006213','1','admin','79','-','advantages','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('850','1666006214','1','admin','78','13','advantages','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('851','1666006234','1','admin','20','3','Main page','Saving template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('852','1666006234','1','admin','16','3','Main page','Editing template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('853','1666006277','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('854','1666006282','1','admin','77','-','Новый чанк','Creating a new Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('855','1666006314','1','admin','79','-','trade_in_section','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('856','1666006314','1','admin','78','14','trade_in_section','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('857','1666006325','1','admin','20','3','Main page','Saving template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('858','1666006325','1','admin','16','3','Main page','Editing template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('859','1666006416','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('860','1666006418','1','admin','77','-','Новый чанк','Creating a new Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('861','1666006435','1','admin','79','-','map_contacts','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('862','1666006435','1','admin','78','15','map_contacts','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('863','1666006456','1','admin','20','3','Main page','Saving template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('864','1666006456','1','admin','16','3','Main page','Editing template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('865','1666006627','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('866','1666006629','1','admin','77','-','Новый чанк','Creating a new Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('867','1666006656','1','admin','79','-','main_dasclaimer','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('868','1666006656','1','admin','78','16','main_dasclaimer','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36');

INSERT INTO `dy5r_manager_log` VALUES
  ('869','1666006666','1','admin','20','3','Main page','Saving template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('870','1666006666','1','admin','16','3','Main page','Editing template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('871','1666006753','1','admin','27','1','Main page','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('872','1666006853','1','admin','79','16','main_dasclaimer','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('873','1666006853','1','admin','78','16','main_dasclaimer','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('874','1666006915','1','admin','5','1','Main page','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('875','1666006915','1','admin','27','1','Main page','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('876','1666007253','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('877','1666007260','1','admin','300','-','Новый параметр (TV)','Create Template Variable','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('878','1666007320','1','admin','302','-','Model disclaimer','Save Template Variable','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('879','1666007320','1','admin','301','10','Model disclaimer','Edit Template Variable','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('880','1666007326','1','admin','27','1','Main page','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('881','1666007373','1','admin','5','1','Main page','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('882','1666007373','1','admin','27','1','Main page','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('883','1666007405','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('884','1666007409','1','admin','16','3','Main page','Editing template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('885','1666007419','1','admin','20','3','Main page','Saving template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('886','1666007419','1','admin','16','3','Main page','Editing template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('887','1666007457','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('888','1666007478','1','admin','301','10','Model disclaimer','Edit Template Variable','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('889','1666007494','1','admin','302','10','Model disclaimer','Save Template Variable','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('890','1666007494','1','admin','301','10','Model disclaimer','Edit Template Variable','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('891','1666007502','1','admin','27','1','Main page','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('892','1666007530','1','admin','5','1','Main page','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('893','1666007530','1','admin','27','1','Main page','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('894','1666116117','1','admin','27','2','Сервис','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('895','1666116126','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('896','1666116140','1','admin','16','4','Service page','Editing template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('897','1666116392','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('898','1666116395','1','admin','16','3','Main page','Editing template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('899','1666116468','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36');

INSERT INTO `dy5r_manager_log` VALUES
  ('900','1666116475','1','admin','77','-','Новый чанк','Creating a new Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('901','1666116509','1','admin','79','-','service_nav','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('902','1666116509','1','admin','78','17','service_nav','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('903','1666116517','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('904','1666116536','1','admin','77','-','Новый чанк','Creating a new Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('905','1666116577','1','admin','79','-','service_slider_form','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('906','1666116577','1','admin','78','18','service_slider_form','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('907','1666116588','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('908','1666116590','1','admin','77','-','Новый чанк','Creating a new Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('909','1666116629','1','admin','79','-','service_slider','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('910','1666116629','1','admin','78','19','service_slider','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('911','1666116634','1','admin','20','4','Service page','Saving template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('912','1666116634','1','admin','16','4','Service page','Editing template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('913','1666116871','1','admin','20','4','Service page','Saving template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('914','1666116871','1','admin','16','4','Service page','Editing template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('915','1666116876','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('916','1666116878','1','admin','77','-','Новый чанк','Creating a new Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('917','1666116992','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('918','1666116996','1','admin','16','3','Main page','Editing template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('919','1666117032','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('920','1666117035','1','admin','77','-','Новый чанк','Creating a new Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('921','1666117036','1','admin','67','-','-','Removing locks','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('922','1666117048','1','admin','79','-','services_list','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('923','1666117048','1','admin','78','20','services_list','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('924','1666117050','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('925','1666117052','1','admin','77','-','Новый чанк','Creating a new Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('926','1666117168','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('927','1666117175','1','admin','78','7','models_nav','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('928','1666117182','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('929','1666117185','1','admin','78','6','model_item','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('930','1666117347','1','admin','79','-','services_item','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36');

INSERT INTO `dy5r_manager_log` VALUES
  ('931','1666117347','1','admin','78','21','services_item','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('932','1666117404','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('933','1666117410','1','admin','78','21','services_item','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('934','1666117445','1','admin','4','-','Новый ресурс','Creating a resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('935','1666117454','1','admin','4','-','Новый ресурс','Creating a resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('936','1666117454','1','admin','67','-','-','Removing locks','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('937','1666117456','1','admin','5','-','Services','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('938','1666117456','1','admin','27','11','Services','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('939','1666117461','1','admin','4','-','Новый ресурс','Creating a resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('940','1666117499','1','admin','4','-','Новый ресурс','Creating a resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('941','1666117499','1','admin','67','-','-','Removing locks','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('942','1666117501','1','admin','5','-','Техническое обслуживание','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('943','1666117501','1','admin','27','12','Техническое обслуживание','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('944','1666117518','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('945','1666117530','1','admin','19','-','Новый шаблон','Creating a new template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('946','1666117555','1','admin','20','-','services_item','Saving template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('947','1666117555','1','admin','16','8','services_item','Editing template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('948','1666117561','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('949','1666117572','1','admin','16','4','Service page','Editing template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('950','1666117577','1','admin','20','4','Service page','Saving template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('951','1666117578','1','admin','16','4','Service page','Editing template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('952','1666117585','1','admin','79','20','services_list','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('953','1666117585','1','admin','78','20','services_list','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('954','1666117593','1','admin','79','20','services_list','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('955','1666117594','1','admin','78','20','services_list','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('956','1666117609','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('957','1666117629','1','admin','301','7','Image','Edit Template Variable','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('958','1666117650','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('959','1666117653','1','admin','301','7','Image','Edit Template Variable','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('960','1666117659','1','admin','302','7','Image','Save Template Variable','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('961','1666117660','1','admin','301','7','Image','Edit Template Variable','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36');

INSERT INTO `dy5r_manager_log` VALUES
  ('962','1666117674','1','admin','5','12','Техническое обслуживание','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('963','1666117674','1','admin','27','12','Техническое обслуживание','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('964','1666117678','1','admin','27','12','Техническое обслуживание','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('965','1666117708','1','admin','5','12','Техническое обслуживание','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('966','1666117708','1','admin','27','12','Техническое обслуживание','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('967','1666117723','1','admin','5','12','Техническое обслуживание','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('968','1666117723','1','admin','27','12','Техническое обслуживание','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('969','1666117788','1','admin','94','12','Копия Техническое обслуживание','Duplicate resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('970','1666117788','1','admin','3','13','Копия Техническое обслуживание','Viewing data for resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('971','1666117790','1','admin','27','13','Копия Техническое обслуживание','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('972','1666117824','1','admin','5','13','Диагностика','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('973','1666117824','1','admin','27','13','Диагностика','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('974','1666117832','1','admin','5','13','Диагностика','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('975','1666117832','1','admin','27','13','Диагностика','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('976','1666117865','1','admin','79','21','services_item','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('977','1666117865','1','admin','78','21','services_item','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('978','1666117878','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('979','1666117889','1','admin','78','20','services_list','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('980','1666117895','1','admin','79','20','services_list','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('981','1666117895','1','admin','78','20','services_list','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('982','1666118284','1','admin','27','13','Диагностика','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('983','1666118291','1','admin','94','13','Копия Диагностика','Duplicate resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('984','1666118291','1','admin','3','14','Копия Диагностика','Viewing data for resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('985','1666118293','1','admin','27','14','Копия Диагностика','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('986','1666118350','1','admin','5','14','Кузовной ремонт','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('987','1666118350','1','admin','27','14','Кузовной ремонт','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('988','1666118417','1','admin','27','12','Техническое обслуживание','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('989','1666118420','1','admin','27','13','Диагностика','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('990','1666118422','1','admin','27','14','Кузовной ремонт','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('991','1666118439','1','admin','5','13','Диагностика','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('992','1666118439','1','admin','27','13','Диагностика','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36');

INSERT INTO `dy5r_manager_log` VALUES
  ('993','1666118445','1','admin','5','14','Кузовной ремонт','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('994','1666118446','1','admin','27','14','Кузовной ремонт','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('995','1666118455','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('996','1666118462','1','admin','78','6','model_item','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('997','1666118469','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('998','1666118525','1','admin','78','6','model_item','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('999','1666118531','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1000','1666118546','1','admin','16','5','Model','Editing template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1001','1666118550','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1002','1666118554','1','admin','16','3','Main page','Editing template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1003','1666118573','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1004','1666118581','1','admin','16','6','banner','Editing template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1005','1666118585','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1006','1666118590','1','admin','78','10','main_slider','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1007','1666118609','1','admin','79','20','services_list','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1008','1666118609','1','admin','78','20','services_list','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1009','1666118653','1','admin','27','14','Кузовной ремонт','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1010','1666118657','1','admin','94','14','Копия Кузовной ремонт','Duplicate resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1011','1666118657','1','admin','3','15','Копия Кузовной ремонт','Viewing data for resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1012','1666118662','1','admin','27','15','Копия Кузовной ремонт','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1013','1666118674','1','admin','5','15','Запасные части и аксессуары','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1014','1666118674','1','admin','27','15','Запасные части и аксессуары','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1015','1666118681','1','admin','94','15','Копия Запасные части и аксессуары','Duplicate resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1016','1666118682','1','admin','3','16','Копия Запасные части и аксессуары','Viewing data for resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1017','1666118684','1','admin','27','16','Копия Запасные части и аксессуары','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1018','1666118692','1','admin','5','16','Дополнительное оборудование','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1019','1666118692','1','admin','27','16','Дополнительное оборудование','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1020','1666118698','1','admin','94','16','Копия Дополнительное оборудование','Duplicate resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1021','1666118698','1','admin','3','17','Копия Дополнительное оборудование','Viewing data for resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1022','1666118700','1','admin','27','17','Копия Дополнительное оборудование','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1023','1666118741','1','admin','5','17','Шиномонтаж','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36');

INSERT INTO `dy5r_manager_log` VALUES
  ('1024','1666118741','1','admin','27','17','Шиномонтаж','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1025','1666118747','1','admin','5','17','Шиномонтаж','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1026','1666118748','1','admin','27','17','Шиномонтаж','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1027','1666118781','1','admin','5','16','Дополнительное оборудование','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1028','1666118781','1','admin','27','16','Дополнительное оборудование','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1029','1666118785','1','admin','5','16','Дополнительное оборудование','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1030','1666118785','1','admin','27','16','Дополнительное оборудование','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1031','1666118811','1','admin','5','15','Запасные части и аксессуары','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1032','1666118811','1','admin','27','15','Запасные части и аксессуары','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1033','1666118817','1','admin','5','15','Запасные части и аксессуары','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1034','1666118817','1','admin','27','15','Запасные части и аксессуары','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1035','1666119014','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1036','1666119018','1','admin','77','-','Новый чанк','Creating a new Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1037','1666119294','1','admin','79','-','appointment_to','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1038','1666119294','1','admin','78','22','appointment_to','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1039','1666119296','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1040','1666119307','1','admin','16','4','Service page','Editing template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1041','1666119333','1','admin','20','4','Service page','Saving template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1042','1666119333','1','admin','16','4','Service page','Editing template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1043','1666119395','1','admin','79','22','appointment_to','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1044','1666119396','1','admin','78','22','appointment_to','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1045','1666119426','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1046','1666119438','1','admin','300','-','Новый параметр (TV)','Create Template Variable','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1047','1666119482','1','admin','302','-','appointment_to','Save Template Variable','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1048','1666119482','1','admin','301','11','appointment_to','Edit Template Variable','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1049','1666119495','1','admin','302','11','appointment for to','Save Template Variable','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1050','1666119495','1','admin','301','11','appointment for to','Edit Template Variable','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1051','1666119500','1','admin','27','2','Сервис','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1052','1666119926','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1053','1666119938','1','admin','78','6','model_item','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1054','1666119987','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36');

INSERT INTO `dy5r_manager_log` VALUES
  ('1055','1666120031','1','admin','79','22','appointment_to','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1056','1666120032','1','admin','78','22','appointment_to','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1057','1666120048','1','admin','27','2','Сервис','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1058','1666120087','1','admin','301','11','appointment for to','Edit Template Variable','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1059','1666120488','1','admin','5','2','Сервис','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1060','1666120488','1','admin','27','2','Сервис','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1061','1666120688','1','admin','5','2','Сервис','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1062','1666120688','1','admin','27','2','Сервис','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1063','1666120793','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1064','1666120799','1','admin','301','6','Model benefit','Edit Template Variable','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1065','1666120804','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1066','1666120812','1','admin','78','6','model_item','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1067','1666120857','1','admin','79','22','appointment_to','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1068','1666120857','1','admin','78','22','appointment_to','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1069','1666120910','1','admin','79','22','appointment_to','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1070','1666120910','1','admin','78','22','appointment_to','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1071','1666121056','1','admin','5','2','Сервис','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1072','1666121056','1','admin','27','2','Сервис','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1073','1666121074','1','admin','5','2','Сервис','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1074','1666121074','1','admin','27','2','Сервис','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1075','1666121099','1','admin','79','6','model_item','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1076','1666121099','1','admin','78','6','model_item','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1077','1666121106','1','admin','27','2','Сервис','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1078','1666121363','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1079','1666121372','1','admin','301','11','appointment for to','Edit Template Variable','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1080','1666121376','1','admin','302','11','appointment for to','Save Template Variable','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1081','1666121377','1','admin','301','11','appointment for to','Edit Template Variable','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1082','1666121380','1','admin','302','11','appointment for to','Save Template Variable','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1083','1666121381','1','admin','301','11','appointment for to','Edit Template Variable','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1084','1666121382','1','admin','27','2','Сервис','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1085','1666121417','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36');

INSERT INTO `dy5r_manager_log` VALUES
  ('1086','1666121422','1','admin','301','6','Model benefit','Edit Template Variable','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1087','1666121434','1','admin','302','11','appointment for to','Save Template Variable','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1088','1666121435','1','admin','301','11','appointment for to','Edit Template Variable','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1089','1666121437','1','admin','27','2','Сервис','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1090','1666121444','1','admin','302','11','appointment for to','Save Template Variable','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1091','1666121444','1','admin','301','11','appointment for to','Edit Template Variable','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1092','1666121447','1','admin','5','2','Сервис','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1093','1666121447','1','admin','27','2','Сервис','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1094','1666121496','1','admin','27','5','Sportage','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1095','1666161091','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1096','1666161094','1','admin','301','11','appointment for to','Edit Template Variable','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1097','1666161099','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1098','1666161125','1','admin','78','22','appointment_to','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1099','1666161142','1','admin','79','22','appointment_to','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1100','1666161142','1','admin','78','22','appointment_to','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1101','1666161146','1','admin','5','2','Сервис','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1102','1666161147','1','admin','27','2','Сервис','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1103','1666161159','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1104','1666161179','1','admin','78','22','appointment_to','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1105','1666161189','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1106','1666161195','1','admin','301','11','appointment for to','Edit Template Variable','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1107','1666161204','1','admin','302','11','appointment for to','Save Template Variable','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1108','1666161204','1','admin','301','11','appointment for to','Edit Template Variable','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1109','1666161236','1','admin','302','11','appointment for to','Save Template Variable','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1110','1666161236','1','admin','301','11','appointment for to','Edit Template Variable','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1111','1666161238','1','admin','27','2','Сервис','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1112','1666161260','1','admin','302','11','appointment for to','Save Template Variable','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1113','1666161260','1','admin','301','11','appointment for to','Edit Template Variable','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1114','1666161261','1','admin','27','1','Main page','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1115','1666161295','1','admin','79','22','appointment_to','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1116','1666161295','1','admin','78','22','appointment_to','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36');

INSERT INTO `dy5r_manager_log` VALUES
  ('1117','1666161308','1','admin','302','11','appointment for to','Save Template Variable','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1118','1666161308','1','admin','301','11','appointment for to','Edit Template Variable','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1119','1666161311','1','admin','27','2','Сервис','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1120','1666161477','1','admin','79','22','appointment_to','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1121','1666161477','1','admin','78','22','appointment_to','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1122','1666161491','1','admin','27','2','Сервис','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1123','1666162243','1','admin','79','22','appointment_to','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1124','1666162243','1','admin','78','22','appointment_to','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1125','1666162247','1','admin','5','2','Сервис','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1126','1666162247','1','admin','27','2','Сервис','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1127','1666162257','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1128','1666162259','1','admin','301','11','appointment for to','Edit Template Variable','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1129','1666162268','1','admin','302','11','appointment for to','Save Template Variable','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1130','1666162268','1','admin','301','11','appointment for to','Edit Template Variable','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1131','1666162360','1','admin','79','22','appointment_to','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1132','1666162360','1','admin','78','22','appointment_to','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1133','1666162366','1','admin','302','11','appointment for to','Save Template Variable','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1134','1666162366','1','admin','301','11','appointment for to','Edit Template Variable','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1135','1666162371','1','admin','5','2','Сервис','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1136','1666162371','1','admin','27','2','Сервис','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1137','1666162506','1','admin','5','2','Сервис','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1138','1666162506','1','admin','27','2','Сервис','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1139','1666162555','1','admin','5','2','Сервис','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1140','1666162555','1','admin','27','2','Сервис','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1141','1666162701','1','admin','5','2','Сервис','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1142','1666162701','1','admin','27','2','Сервис','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1143','1666162723','1','admin','79','22','appointment_to','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1144','1666162723','1','admin','78','22','appointment_to','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1145','1666162844','1','admin','5','2','Сервис','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1146','1666162844','1','admin','27','2','Сервис','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1147','1666162997','1','admin','4','-','Новый ресурс','Creating a resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36');

INSERT INTO `dy5r_manager_log` VALUES
  ('1148','1666163011','1','admin','4','-','Новый ресурс','Creating a resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1149','1666163011','1','admin','67','-','-','Removing locks','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1150','1666163014','1','admin','5','-','Special offers','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1151','1666163014','1','admin','27','18','Special offers','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1152','1666163026','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1153','1666163037','1','admin','77','-','Новый чанк','Creating a new Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1154','1666163108','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1155','1666163125','1','admin','301','7','Image','Edit Template Variable','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1156','1666163370','1','admin','79','-','service_offer_item','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1157','1666163370','1','admin','78','23','service_offer_item','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1158','1666163380','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1159','1666163400','1','admin','19','-','Новый шаблон','Creating a new template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1160','1666163425','1','admin','20','-','Service offer item','Saving template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1161','1666163425','1','admin','16','9','Service offer item','Editing template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1162','1666163431','1','admin','4','-','Новый ресурс','Creating a resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1163','1666163478','1','admin','4','-','Новый ресурс','Creating a resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1164','1666163478','1','admin','67','-','-','Removing locks','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1165','1666163487','1','admin','5','-','Заправка кондиционера – 3 900 руб.','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1166','1666163487','1','admin','27','19','Заправка кондиционера – 3 900 руб.','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1167','1666163509','1','admin','5','19','Заправка кондиционера – 3 900 руб.','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1168','1666163509','1','admin','27','19','Заправка кондиционера – 3 900 руб.','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1169','1666163519','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1170','1666163524','1','admin','301','7','Image','Edit Template Variable','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1171','1666163529','1','admin','302','7','Image','Save Template Variable','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1172','1666163529','1','admin','301','7','Image','Edit Template Variable','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1173','1666163534','1','admin','5','19','Заправка кондиционера – 3 900 руб.','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1174','1666163534','1','admin','27','19','Заправка кондиционера – 3 900 руб.','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1175','1666163564','1','admin','5','19','Заправка кондиционера – 3 900 руб.','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1176','1666163564','1','admin','27','19','Заправка кондиционера – 3 900 руб.','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1177','1666163574','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1178','1666163589','1','admin','77','-','Новый чанк','Creating a new Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36');

INSERT INTO `dy5r_manager_log` VALUES
  ('1179','1666163654','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1180','1666163658','1','admin','16','3','Main page','Editing template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1181','1666163709','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1182','1666163715','1','admin','78','23','service_offer_item','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1183','1666163731','1','admin','79','-','service_offers_list','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1184','1666163731','1','admin','78','24','service_offers_list','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1185','1666163760','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1186','1666163767','1','admin','16','4','Service page','Editing template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1187','1666163778','1','admin','20','4','Service page','Saving template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1188','1666163778','1','admin','16','4','Service page','Editing template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1189','1666163821','1','admin','4','-','Новый ресурс','Creating a resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1190','1666163921','1','admin','5','-','Замена масла АКПП','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1191','1666163922','1','admin','27','20','Замена масла АКПП','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1192','1666163947','1','admin','4','-','Новый ресурс','Creating a resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1193','1666163999','1','admin','5','-','Акция «Счастливые часы»','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1194','1666163999','1','admin','27','21','Акция «Счастливые часы»','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1195','1666164032','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1196','1666164036','1','admin','77','-','Новый чанк','Creating a new Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1197','1666164097','1','admin','79','-','service_advantages','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1198','1666164097','1','admin','78','25','service_advantages','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1199','1666164099','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1200','1666164111','1','admin','16','4','Service page','Editing template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1201','1666164121','1','admin','20','4','Service page','Saving template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1202','1666164121','1','admin','16','4','Service page','Editing template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1203','1666164145','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1204','1666164148','1','admin','77','-','Новый чанк','Creating a new Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1205','1666164203','1','admin','79','-','get_consultation','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1206','1666164203','1','admin','78','26','get_consultation','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1207','1666164213','1','admin','20','4','Service page','Saving template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1208','1666164213','1','admin','16','4','Service page','Editing template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1209','1666164231','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36');

INSERT INTO `dy5r_manager_log` VALUES
  ('1210','1666164237','1','admin','16','3','Main page','Editing template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1211','1666164278','1','admin','20','4','Service page','Saving template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1212','1666164279','1','admin','16','4','Service page','Editing template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1213','1666164313','1','admin','27','2','Сервис','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1214','1666164333','1','admin','5','2','Сервис','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1215','1666164334','1','admin','27','2','Сервис','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1216','1666164422','1','admin','5','2','Сервис','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1217','1666164422','1','admin','27','2','Сервис','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1218','1666164465','1','admin','5','2','Сервис','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1219','1666164465','1','admin','27','2','Сервис','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1220','1666164488','1','admin','5','2','Сервис','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1221','1666164489','1','admin','27','2','Сервис','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1222','1666164577','1','admin','27','3','Models','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1223','1666164585','1','admin','27','1','Main page','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1224','1666164594','1','admin','27','7','Slider','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1225','1666164598','1','admin','5','7','Slider','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1226','1666164598','1','admin','27','7','Slider','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1227','1666164601','1','admin','27','3','Models','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1228','1666164604','1','admin','5','3','Models','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1229','1666164604','1','admin','27','3','Models','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1230','1666164606','1','admin','56','-','-','Refresh resource tree','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1231','1666164640','1','admin','56','-','-','Refresh resource tree','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1232','1666164658','1','admin','5','7','Slider','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1233','1666164658','1','admin','27','7','Slider','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1234','1666176354','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1235','1666176366','1','admin','17','-','-','Editing settings','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1236','1666176389','1','admin','30','-','-','Saving settings','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1237','1666176396','1','admin','17','-','-','Editing settings','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1238','1666176460','1','admin','30','-','-','Saving settings','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1239','1666176467','1','admin','8','-','-','Logged out','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1240','1666176487','1','admin','58','-','MODX','Logged in','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36');

INSERT INTO `dy5r_manager_log` VALUES
  ('1241','1666176493','1','admin','17','-','-','Editing settings','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1242','1666176526','1','admin','30','-','-','Saving settings','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1243','1666176534','1','admin','17','-','-','Editing settings','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1244','1666176543','1','admin','30','-','-','Saving settings','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1245','1666176548','1','admin','17','-','-','Editing settings','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1246','1666177492','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1247','1666177496','1','admin','77','-','Новый чанк','Creating a new Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1248','1666177623','1','admin','79','-','Modals popup','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1249','1666177623','1','admin','78','27','Modals popup','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1250','1666177643','1','admin','79','27','modals_popup','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1251','1666177643','1','admin','78','27','modals_popup','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1252','1666177653','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1253','1666177658','1','admin','16','4','Service page','Editing template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1254','1666177673','1','admin','20','4','Service page','Saving template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1255','1666177673','1','admin','16','4','Service page','Editing template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1256','1666178186','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1257','1666178201','1','admin','78','21','services_item','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1258','1666178208','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1259','1666178233','1','admin','78','23','service_offer_item','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1260','1666178346','1','admin','79','23','service_offer_item','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1261','1666178346','1','admin','78','23','service_offer_item','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1262','1666180064','1','admin','27','8','Максимальные выгоды','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1263','1666180073','1','admin','27','20','Замена масла АКПП','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1264','1666180091','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1265','1666180100','1','admin','78','23','service_offer_item','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1266','1666180135','1','admin','79','23','service_offer_item','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1267','1666180135','1','admin','78','23','service_offer_item','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1268','1666180215','1','admin','79','23','service_offer_item','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1269','1666180215','1','admin','78','23','service_offer_item','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1270','1666180305','1','admin','79','23','service_offer_item','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1271','1666180305','1','admin','78','23','service_offer_item','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36');

INSERT INTO `dy5r_manager_log` VALUES
  ('1272','1666180341','1','admin','79','23','service_offer_item','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1273','1666180341','1','admin','78','23','service_offer_item','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1274','1666180830','1','admin','27','19','Заправка кондиционера – 3 900 руб.','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1275','1666180836','1','admin','5','19','Заправка кондиционера – 3 900 руб.','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1276','1666180837','1','admin','27','19','Заправка кондиционера – 3 900 руб.','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1277','1666181263','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1278','1666181277','1','admin','78','27','modals_popup','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1279','1666181317','1','admin','79','27','modals_popup','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1280','1666181317','1','admin','78','27','modals_popup','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1281','1666181491','1','admin','79','27','modals_popup','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1282','1666181491','1','admin','78','27','modals_popup','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1283','1666181494','1','admin','27','20','Замена масла АКПП','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1284','1666181504','1','admin','5','20','Замена масла АКПП','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1285','1666181504','1','admin','27','20','Замена масла АКПП','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1286','1666181507','1','admin','27','21','Акция «Счастливые часы»','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1287','1666181526','1','admin','5','21','Акция «Счастливые часы»','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1288','1666181527','1','admin','27','21','Акция «Счастливые часы»','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1289','1666181529','1','admin','27','19','Заправка кондиционера – 3 900 руб.','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1290','1666181549','1','admin','5','19','Заправка кондиционера – 3 900 руб.','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1291','1666181549','1','admin','27','19','Заправка кондиционера – 3 900 руб.','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1292','1666182844','1','admin','112','2','Extras','Execute module','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1293','1666182931','1','admin','76','-','Extras','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1294','1666182936','1','admin','22','6','FormLister','Editing Snippet','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1295','1666183226','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1296','1666183230','1','admin','78','27','modals_popup','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1297','1666183253','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1298','1666183257','1','admin','16','3','Main page','Editing template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1299','1666183338','1','admin','20','3','Main page','Saving template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1300','1666183338','1','admin','16','3','Main page','Editing template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1301','1666183353','1','admin','27','2','Сервис','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1302','1666183363','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36');

INSERT INTO `dy5r_manager_log` VALUES
  ('1303','1666183372','1','admin','16','4','Service page','Editing template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1304','1666183389','1','admin','20','4','Service page','Saving template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1305','1666183389','1','admin','16','4','Service page','Editing template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1306','1666183606','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1307','1666183616','1','admin','78','5','nav_links','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1308','1666184042','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1309','1666184052','1','admin','97','5','nav_links Копия','Duplicate Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1310','1666184052','1','admin','78','28','nav_links Копия','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1311','1666184071','1','admin','79','28','service_nav_links','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1312','1666184071','1','admin','78','28','service_nav_links','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1313','1666184102','1','admin','79','28','service_nav_links','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1314','1666184102','1','admin','78','28','service_nav_links','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1315','1666184107','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1316','1666184113','1','admin','16','4','Service page','Editing template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1317','1666184120','1','admin','20','4','Service page','Saving template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1318','1666184120','1','admin','16','4','Service page','Editing template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1319','1666184159','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1320','1666184164','1','admin','78','28','service_nav_links','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1321','1666184187','1','admin','79','28','service_nav_links','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1322','1666184187','1','admin','78','28','service_nav_links','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1323','1666195439','1','admin','17','-','-','Editing settings','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1324','1666195479','1','admin','30','-','-','Saving settings','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1325','1666195484','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1326','1666195498','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1327','1666195574','1','admin','17','-','-','Editing settings','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1328','1666195654','1','admin','30','-','-','Saving settings','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1329','1666195665','1','admin','17','-','-','Editing settings','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1330','1666195679','1','admin','30','-','-','Saving settings','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1331','1666195686','1','admin','8','-','-','Logged out','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1332','1666195690','1','admin','58','-','MODX','Logged in','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1333','1666195718','1','admin','17','-','-','Editing settings','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36');

INSERT INTO `dy5r_manager_log` VALUES
  ('1334','1666195739','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1335','1666197121','1','admin','16','4','Service page','Editing template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1336','1666197126','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1337','1666197129','1','admin','16','3','Main page','Editing template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1338','1666197168','1','admin','20','3','Main page','Saving template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1339','1666197168','1','admin','16','3','Main page','Editing template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1340','1666197367','1','admin','20','3','Main page','Saving template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1341','1666197367','1','admin','16','3','Main page','Editing template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1342','1666197532','1','admin','20','3','Main page','Saving template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1343','1666197532','1','admin','16','3','Main page','Editing template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1344','1666197587','1','admin','20','3','Main page','Saving template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1345','1666197587','1','admin','16','3','Main page','Editing template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1346','1666198537','1','admin','20','3','Main page','Saving template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1347','1666198537','1','admin','16','3','Main page','Editing template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1348','1666198542','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1349','1666198546','1','admin','78','27','modals_popup','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1350','1666198555','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1351','1666198559','1','admin','77','-','Новый чанк','Creating a new Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1352','1666198618','1','admin','79','-','callback_form','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1353','1666198618','1','admin','78','29','callback_form','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1354','1666198635','1','admin','20','3','Main page','Saving template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1355','1666198635','1','admin','16','3','Main page','Editing template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1356','1666198639','1','admin','79','27','modals_popup','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1357','1666198639','1','admin','78','27','modals_popup','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1358','1666198691','1','admin','71','-','-','Searching','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1359','1666198702','1','admin','78','3','header','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1360','1666198746','1','admin','79','29','callback_form','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1361','1666198746','1','admin','78','29','callback_form','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1362','1666199372','1','admin','79','29','callback_form','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1363','1666199372','1','admin','78','29','callback_form','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1364','1666199540','1','admin','79','29','callback_form','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36');

INSERT INTO `dy5r_manager_log` VALUES
  ('1365','1666199540','1','admin','78','29','callback_form','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1366','1666199802','1','admin','79','29','callback_form','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1367','1666199802','1','admin','78','29','callback_form','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1368','1666200060','1','admin','79','27','modals_popup','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1369','1666200060','1','admin','78','27','modals_popup','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1370','1666200072','1','admin','20','3','Main page','Saving template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1371','1666200072','1','admin','16','3','Main page','Editing template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1372','1666200672','1','admin','112','2','Extras','Execute module','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1373','1666250003','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1374','1666250008','1','admin','78','29','callback_form','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1375','1666250085','1','admin','79','29','callback_form','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1376','1666250085','1','admin','78','29','callback_form','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1377','1666250089','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1378','1666250092','1','admin','78','27','modals_popup','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1379','1666252088','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1380','1666252093','1','admin','300','-','Новый параметр (TV)','Create Template Variable','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1381','1666252102','1','admin','67','-','-','Removing locks','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1382','1666252103','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1383','1666252106','1','admin','23','-','Новый сниппет','Creating a new Snippet','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1384','1666252128','1','admin','24','-','debug','Saving Snippet','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1385','1666252128','1','admin','22','12','debug','Editing Snippet','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1386','1666252132','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1387','1666252137','1','admin','16','3','Main page','Editing template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1388','1666252157','1','admin','20','3','Main page','Saving template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1389','1666252157','1','admin','16','3','Main page','Editing template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1390','1666252222','1','admin','20','3','Main page','Saving template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1391','1666252222','1','admin','16','3','Main page','Editing template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1392','1666252275','1','admin','24','12','debug','Saving Snippet','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1393','1666252275','1','admin','22','12','debug','Editing Snippet','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1394','1666252394','1','admin','24','12','debug','Saving Snippet','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1395','1666252394','1','admin','22','12','debug','Editing Snippet','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36');

INSERT INTO `dy5r_manager_log` VALUES
  ('1396','1666252493','1','admin','24','12','debug','Saving Snippet','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1397','1666252493','1','admin','22','12','debug','Editing Snippet','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1398','1666252518','1','admin','24','12','debug','Saving Snippet','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1399','1666252518','1','admin','22','12','debug','Editing Snippet','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1400','1666252552','1','admin','24','12','debug','Saving Snippet','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1401','1666252552','1','admin','22','12','debug','Editing Snippet','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1402','1666252572','1','admin','24','12','debug','Saving Snippet','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1403','1666252572','1','admin','22','12','debug','Editing Snippet','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1404','1666252603','1','admin','24','12','debug','Saving Snippet','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1405','1666252603','1','admin','22','12','debug','Editing Snippet','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1406','1666252773','1','admin','20','3','Main page','Saving template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1407','1666252774','1','admin','16','3','Main page','Editing template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1408','1666252782','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1409','1666252784','1','admin','16','3','Main page','Editing template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1410','1666252788','1','admin','20','3','Main page','Saving template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1411','1666252788','1','admin','16','3','Main page','Editing template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1412','1666255056','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1413','1666255060','1','admin','23','-','Новый сниппет','Creating a new Snippet','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1414','1666255188','1','admin','24','-','form','Saving Snippet','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1415','1666255189','1','admin','22','13','form','Editing Snippet','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1416','1666255198','1','admin','4','-','Новый ресурс','Creating a resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1417','1666255207','1','admin','4','-','Новый ресурс','Creating a resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1418','1666255207','1','admin','67','-','-','Removing locks','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1419','1666255450','1','admin','5','-','Form','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1420','1666255450','1','admin','27','22','Form','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1421','1666255461','1','admin','5','22','Form','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1422','1666255461','1','admin','27','22','Form','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1423','1666255569','1','admin','24','13','form','Saving Snippet','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1424','1666255569','1','admin','22','13','form','Editing Snippet','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1425','1666255622','1','admin','24','13','form','Saving Snippet','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1426','1666255622','1','admin','22','13','form','Editing Snippet','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36');

INSERT INTO `dy5r_manager_log` VALUES
  ('1427','1666255632','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1428','1666255645','1','admin','78','27','modals_popup','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1429','1666255738','1','admin','71','-','-','Searching','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1430','1666255742','1','admin','78','23','service_offer_item','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1431','1666255822','1','admin','79','27','modals_popup','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1432','1666255823','1','admin','78','27','modals_popup','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1433','1666256159','1','admin','71','-','-','Searching','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1434','1666256161','1','admin','78','1','head','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1435','1666256443','1','admin','79','27','modals_popup','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1436','1666256443','1','admin','78','27','modals_popup','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1437','1666256821','1','admin','27','22','Form','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1438','1666264258','1','admin','17','-','-','Editing settings','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1439','1666264309','1','admin','30','-','-','Saving settings','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1440','1666264323','1','admin','26','-','-','Refreshing site','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1441','1666264325','1','admin','26','-','-','Refreshing site','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1442','1666264387','1','admin','17','-','-','Editing settings','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1443','1666264461','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1444','1666264500','1','admin','78','5','nav_links','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1445','1666264710','1','admin','71','-','-','Searching','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1446','1666264764','1','admin','79','5','nav_links','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1447','1666264764','1','admin','78','5','nav_links','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1448','1666264785','1','admin','27','2','Сервис','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1449','1666264970','1','admin','27','2','Сервис','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1450','1666265076','1','admin','71','-','-','Searching','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1451','1666265079','1','admin','71','-','-','Searching','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1452','1666265080','1','admin','71','-','-','Searching','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1453','1666265080','1','admin','71','-','-','Searching','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1454','1666265081','1','admin','71','-','-','Searching','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1455','1666265081','1','admin','71','-','-','Searching','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1456','1666265086','1','admin','71','-','-','Searching','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1457','1666265086','1','admin','71','-','-','Searching','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36');

INSERT INTO `dy5r_manager_log` VALUES
  ('1458','1666265087','1','admin','71','-','-','Searching','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1459','1666265087','1','admin','71','-','-','Searching','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1460','1666265088','1','admin','71','-','-','Searching','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1461','1666265089','1','admin','71','-','-','Searching','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1462','1666265089','1','admin','71','-','-','Searching','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1463','1666265089','1','admin','71','-','-','Searching','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1464','1666265198','1','admin','17','-','-','Editing settings','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1465','1666265205','1','admin','30','-','-','Saving settings','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1466','1666265225','1','admin','17','-','-','Editing settings','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1467','1666265229','1','admin','30','-','-','Saving settings','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1468','1666265260','1','admin','26','-','-','Refreshing site','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1469','1666265261','1','admin','26','-','-','Refreshing site','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1470','1666265301','1','admin','17','-','-','Editing settings','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1471','1666265450','1','admin','30','-','-','Saving settings','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1472','1666265521','1','admin','17','-','-','Editing settings','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1473','1666265527','1','admin','30','-','-','Saving settings','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1474','1666265562','1','admin','3','22','Form','Viewing data for resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1475','1666265565','1','admin','27','22','Form','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1476','1666265578','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1477','1666265583','1','admin','22','12','debug','Editing Snippet','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1478','1666265589','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1479','1666265602','1','admin','22','13','form','Editing Snippet','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1480','1666265679','1','admin','17','-','-','Editing settings','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1481','1666265716','1','admin','30','-','-','Saving settings','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1482','1666265729','1','admin','17','-','-','Editing settings','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1483','1666265735','1','admin','30','-','-','Saving settings','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1484','1666265758','1','admin','17','-','-','Editing settings','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1485','1666265766','1','admin','30','-','-','Saving settings','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1486','1666266491','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1487','1666266502','1','admin','22','13','form','Editing Snippet','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1488','1666267420','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36');

INSERT INTO `dy5r_manager_log` VALUES
  ('1489','1666267423','1','admin','77','-','Новый чанк','Creating a new Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1490','1666267438','1','admin','79','-','formReport','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1491','1666267439','1','admin','78','30','formReport','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1492','1666267807','1','admin','71','-','-','Searching','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1493','1666267812','1','admin','78','27','modals_popup','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1494','1666270153','1','admin','114','-','-','View event log','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1495','1666270155','1','admin','115','43','-','View event log details','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1496','1666270387','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1497','1666270391','1','admin','78','27','modals_popup','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1498','1666270415','1','admin','79','27','modals_popup','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1499','1666270415','1','admin','78','27','modals_popup','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1500','1666270422','1','admin','114','-','-','View event log','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1501','1666270424','1','admin','116','-','-','Delete event log','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1502','1666270424','1','admin','114','-','-','View event log','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1503','1666270582','1','admin','114','-','-','View event log','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1504','1666270587','1','admin','115','46','-','View event log details','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1505','1666270690','1','admin','24','13','form','Saving Snippet','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1506','1666270690','1','admin','22','13','form','Editing Snippet','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1507','1666270752','1','admin','79','27','modals_popup','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1508','1666270752','1','admin','78','27','modals_popup','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1509','1666270825','1','admin','79','27','modals_popup','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1510','1666270825','1','admin','78','27','modals_popup','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1511','1666270898','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1512','1666270901','1','admin','78','29','callback_form','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1513','1666270911','1','admin','79','29','callback_form','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1514','1666270911','1','admin','78','29','callback_form','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1515','1666270920','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1516','1666270922','1','admin','78','29','callback_form','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1517','1666270946','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1518','1666270953','1','admin','97','29','callback_form Копия','Duplicate Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1519','1666270954','1','admin','78','31','callback_form Копия','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36');

INSERT INTO `dy5r_manager_log` VALUES
  ('1520','1666270989','1','admin','79','31','service_special_offer_form','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1521','1666270989','1','admin','78','31','service_special_offer_form','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1522','1666271008','1','admin','97','31','service_special_offer_form Копия','Duplicate Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1523','1666271008','1','admin','78','32','service_special_offer_form Копия','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1524','1666271023','1','admin','79','32','thanks_form','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1525','1666271023','1','admin','78','32','thanks_form','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1526','1666271032','1','admin','79','27','modals_popup','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1527','1666271033','1','admin','78','27','modals_popup','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1528','1666271040','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1529','1666271044','1','admin','16','3','Main page','Editing template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1530','1666271071','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1531','1666271079','1','admin','78','27','modals_popup','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1532','1666271085','1','admin','79','27','modals_popup','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1533','1666271085','1','admin','78','27','modals_popup','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1534','1666271097','1','admin','20','3','Main page','Saving template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1535','1666271097','1','admin','16','3','Main page','Editing template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1536','1666271149','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1537','1666271152','1','admin','78','32','thanks_form','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1538','1666271157','1','admin','79','32','thanks_form','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1539','1666271157','1','admin','78','32','thanks_form','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1540','1666271159','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1541','1666271162','1','admin','16','3','Main page','Editing template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1542','1666271167','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1543','1666271170','1','admin','16','4','Service page','Editing template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1544','1666271194','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1545','1666271204','1','admin','78','27','modals_popup','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1546','1666271222','1','admin','20','4','Service page','Saving template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1547','1666271222','1','admin','16','4','Service page','Editing template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1548','1666271233','1','admin','20','3','Main page','Saving template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1549','1666271234','1','admin','16','3','Main page','Editing template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1550','1666271248','1','admin','80','27','modals_popup','Deleting Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36');

INSERT INTO `dy5r_manager_log` VALUES
  ('1551','1666271248','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1552','1666271307','1','admin','78','30','formReport','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1553','1666271417','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1554','1666271420','1','admin','78','29','callback_form','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1555','1666271489','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1556','1666271491','1','admin','78','31','service_special_offer_form','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1557','1666271557','1','admin','79','29','callback_form','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1558','1666271558','1','admin','78','29','callback_form','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1559','1666271600','1','admin','79','30','formReport','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1560','1666271600','1','admin','78','30','formReport','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1561','1666271652','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1562','1666271654','1','admin','78','29','callback_form','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1563','1666271695','1','admin','79','31','service_special_offer_form','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1564','1666271695','1','admin','78','31','service_special_offer_form','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1565','1666271764','1','admin','71','-','-','Searching','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1566','1666271766','1','admin','22','13','form','Editing Snippet','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1567','1666271826','1','admin','24','13','form','Saving Snippet','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1568','1666271826','1','admin','22','13','form','Editing Snippet','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1569','1666271832','1','admin','71','-','-','Searching','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1570','1666271832','1','admin','71','-','-','Searching','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1571','1666271834','1','admin','301','4','Meta title','Edit Template Variable','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1572','1666271843','1','admin','22','13','form','Editing Snippet','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1573','1666271869','1','admin','27','1','Main page','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1574','1666271883','1','admin','17','-','-','Editing settings','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1575','1666271896','1','admin','30','-','-','Saving settings','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1576','1666272005','1','admin','71','-','-','Searching','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1577','1666272006','1','admin','71','-','-','Searching','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1578','1666272013','1','admin','78','1','head','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1579','1666272018','1','admin','301','4','Meta title','Edit Template Variable','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1580','1666272065','1','admin','302','4','Meta title','Save Template Variable','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1581','1666272066','1','admin','301','4','Meta title','Edit Template Variable','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36');

INSERT INTO `dy5r_manager_log` VALUES
  ('1582','1666272072','1','admin','27','1','Main page','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1583','1666272082','1','admin','27','2','Сервис','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1584','1666272125','1','admin','5','2','Сервис','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1585','1666272126','1','admin','27','2','Сервис','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1586','1666272135','1','admin','5','1','Main page','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1587','1666272135','1','admin','27','1','Main page','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1588','1666272195','1','admin','5','2','Сервис','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1589','1666272195','1','admin','27','2','Сервис','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1590','1666272227','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1591','1666272248','1','admin','78','1','head','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1592','1666272349','1','admin','93','-','-','Backup Manager','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1593','1666278372','1','admin','17','-','-','Editing settings','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1594','1666278382','1','admin','30','-','-','Saving settings','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1595','1666278397','1','admin','17','-','-','Editing settings','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1596','1666278409','1','admin','30','-','-','Saving settings','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1597','1666278479','1','admin','17','-','-','Editing settings','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1598','1666278564','1','admin','30','-','-','Saving settings','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1599','1666278755','1','admin','17','-','-','Editing settings','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1600','1666278765','1','admin','30','-','-','Saving settings','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1601','1666278859','1','admin','71','-','-','Searching','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1602','1666278861','1','admin','78','7','models_nav','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1603','1666278981','1','admin','71','-','-','Searching','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1604','1666278984','1','admin','78','8','models_nav_item','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1605','1666279089','1','admin','79','7','models_nav','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1606','1666279090','1','admin','78','7','models_nav','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1607','1666279128','1','admin','79','7','models_nav','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1608','1666279128','1','admin','78','7','models_nav','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1609','1666279155','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1610','1666279164','1','admin','78','7','models_nav','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1611','1666279175','1','admin','79','7','models_nav','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1612','1666279175','1','admin','78','7','models_nav','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36');

INSERT INTO `dy5r_manager_log` VALUES
  ('1613','1666279222','1','admin','79','7','models_nav','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1614','1666279223','1','admin','78','7','models_nav','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1615','1666279281','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1616','1666279285','1','admin','78','8','models_nav_item','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1617','1666279679','1','admin','17','-','-','Editing settings','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1618','1666279741','1','admin','30','-','-','Saving settings','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1619','1666279793','1','admin','17','-','-','Editing settings','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1620','1666279855','1','admin','30','-','-','Saving settings','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1621','1666279860','1','admin','17','-','-','Editing settings','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1622','1666280342','1','admin','17','-','-','Editing settings','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1623','1666280346','1','admin','30','-','-','Saving settings','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1624','1666280688','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1625','1666280706','1','admin','78','29','callback_form','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1626','1666280715','1','admin','79','29','callback_form','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1627','1666280715','1','admin','78','29','callback_form','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1628','1666282562','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1629','1666282565','1','admin','16','3','Main page','Editing template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1630','1666282584','1','admin','20','3','Main page','Saving template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1631','1666282584','1','admin','16','3','Main page','Editing template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1632','1666282623','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1633','1666282625','1','admin','16','4','Service page','Editing template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1634','1666282657','1','admin','20','4','Service page','Saving template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1635','1666282658','1','admin','16','4','Service page','Editing template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1636','1666282790','1','admin','27','22','Form','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1637','1666282811','1','admin','5','22','Form','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1638','1666282811','1','admin','27','22','Form','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1639','1666282825','1','admin','4','-','Новый ресурс','Creating a resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1640','1666282842','1','admin','4','-','Новый ресурс','Creating a resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1641','1666282842','1','admin','67','-','-','Removing locks','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1642','1666282844','1','admin','67','-','-','Removing locks','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1643','1666282877','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36');

INSERT INTO `dy5r_manager_log` VALUES
  ('1644','1666282881','1','admin','4','-','Новый ресурс','Creating a resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1645','1666282888','1','admin','4','-','Новый ресурс','Creating a resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1646','1666282888','1','admin','67','-','-','Removing locks','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1647','1666282896','1','admin','5','-','System files','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1648','1666282896','1','admin','27','23','System files','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1649','1666282919','1','admin','27','23','System files','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1650','1666282943','1','admin','5','23','System files','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1651','1666282943','1','admin','27','23','System files','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1652','1666282949','1','admin','3','23','System files','Viewing data for resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1653','1666282979','1','admin','27','1','Main page','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1654','1666282991','1','admin','27','2','Сервис','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1655','1666283006','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1656','1666283989','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1657','1666284006','1','admin','78','7','models_nav','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1658','1666284011','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1659','1666284014','1','admin','78','6','model_item','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1660','1666284030','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1661','1666284034','1','admin','78','8','models_nav_item','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1662','1666284068','1','admin','79','8','models_nav_item','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1663','1666284068','1','admin','78','8','models_nav_item','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1664','1666284145','1','admin','79','8','models_nav_item','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1665','1666284145','1','admin','78','8','models_nav_item','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1666','1666284205','1','admin','79','8','models_nav_item','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1667','1666284205','1','admin','78','8','models_nav_item','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1668','1666284323','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1669','1666284329','1','admin','16','4','Service page','Editing template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1670','1666284339','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1671','1666284345','1','admin','78','19','service_slider','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1672','1666284366','1','admin','79','19','service_slider','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1673','1666284366','1','admin','78','19','service_slider','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1674','1666284630','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36');

INSERT INTO `dy5r_manager_log` VALUES
  ('1675','1666284643','1','admin','301','7','Image','Edit Template Variable','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1676','1666284656','1','admin','302','7','Image','Save Template Variable','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1677','1666284656','1','admin','301','7','Image','Edit Template Variable','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1678','1666284659','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1679','1666284661','1','admin','301','8','Image mobile version','Edit Template Variable','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1680','1666284665','1','admin','302','8','Image mobile version','Save Template Variable','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1681','1666284666','1','admin','301','8','Image mobile version','Edit Template Variable','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1682','1666284668','1','admin','27','2','Сервис','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1683','1666284725','1','admin','5','2','Сервис','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1684','1666284726','1','admin','27','2','Сервис','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1685','1666284751','1','admin','79','19','service_slider','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1686','1666284751','1','admin','78','19','service_slider','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1687','1666285022','1','admin','79','19','service_slider','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1688','1666285023','1','admin','78','19','service_slider','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1689','1666285098','1','admin','79','19','service_slider','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1690','1666285099','1','admin','78','19','service_slider','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1691','1666285117','1','admin','27','1','Main page','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1692','1666285128','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1693','1666285145','1','admin','22','13','form','Editing Snippet','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1694','1666285366','1','admin','24','13','form','Saving Snippet','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1695','1666285366','1','admin','22','13','form','Editing Snippet','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1696','1666285381','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1697','1666285387','1','admin','300','-','Новый параметр (TV)','Create Template Variable','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1698','1666285444','1','admin','302','-','Form recipients','Save Template Variable','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1699','1666285444','1','admin','301','12','Form recipients','Edit Template Variable','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1700','1666285453','1','admin','27','1','Main page','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1701','1666285473','1','admin','5','1','Main page','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1702','1666285473','1','admin','27','1','Main page','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1703','1666285528','1','admin','5','1','Main page','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1704','1666285528','1','admin','27','1','Main page','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1705','1666285743','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36');

INSERT INTO `dy5r_manager_log` VALUES
  ('1706','1666285762','1','admin','22','13','form','Editing Snippet','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1707','1666285815','1','admin','5','1','Main page','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1708','1666285815','1','admin','27','1','Main page','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1709','1666286010','1','admin','24','13','form','Saving Snippet','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1710','1666286010','1','admin','22','13','form','Editing Snippet','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1711','1666286037','1','admin','114','-','-','View event log','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1712','1666286043','1','admin','115','51','-','View event log details','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1713','1666286101','1','admin','24','13','form','Saving Snippet','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1714','1666286101','1','admin','22','13','form','Editing Snippet','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1715','1666286110','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1716','1666286135','1','admin','22','13','form','Editing Snippet','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1717','1666286145','1','admin','24','13','form','Saving Snippet','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1718','1666286145','1','admin','22','13','form','Editing Snippet','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1719','1666286151','1','admin','71','-','-','Searching','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1720','1666286151','1','admin','71','-','-','Searching','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1721','1666286154','1','admin','16','4','Service page','Editing template','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1722','1666286166','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1723','1666286192','1','admin','78','9','timer_form','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1724','1666286204','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1725','1666286207','1','admin','78','29','callback_form','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1726','1666286232','1','admin','79','9','timer_form','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1727','1666286232','1','admin','78','9','timer_form','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1728','1666286247','1','admin','71','-','-','Searching','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1729','1666286250','1','admin','78','18','service_slider_form','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1730','1666286265','1','admin','79','18','service_slider_form','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1731','1666286265','1','admin','78','18','service_slider_form','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1732','1666286282','1','admin','71','-','-','Searching','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1733','1666286284','1','admin','78','26','get_consultation','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1734','1666286311','1','admin','79','26','get_consultation','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1735','1666286311','1','admin','78','26','get_consultation','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1736','1666286315','1','admin','71','-','-','Searching','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36');

INSERT INTO `dy5r_manager_log` VALUES
  ('1737','1666286317','1','admin','78','9','timer_form','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1738','1666286325','1','admin','79','9','timer_form','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1739','1666286325','1','admin','78','9','timer_form','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1740','1666286328','1','admin','78','18','service_slider_form','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1741','1666286338','1','admin','79','18','service_slider_form','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1742','1666286338','1','admin','78','18','service_slider_form','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1743','1666286345','1','admin','78','9','timer_form','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1744','1666286378','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1745','1666286383','1','admin','78','9','timer_form','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1746','1666286391','1','admin','79','9','timer_form','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1747','1666286392','1','admin','78','9','timer_form','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1748','1666286878','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1749','1666286906','1','admin','78','26','get_consultation','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1750','1666286931','1','admin','79','26','get_consultation','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1751','1666286931','1','admin','78','26','get_consultation','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1752','1666287737','1','admin','79','26','get_consultation','Saving Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1753','1666287737','1','admin','78','26','get_consultation','Editing Chunk (HTML Snippet)','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1754','1666288016','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1755','1666288019','1','admin','22','10','version','Editing Snippet','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1756','1666288026','1','admin','24','10','version','Saving Snippet','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1757','1666288026','1','admin','22','10','version','Editing Snippet','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1758','1666288461','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1759','1666288468','1','admin','22','13','form','Editing Snippet','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1760','1666288490','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1761','1666288498','1','admin','22','10','version','Editing Snippet','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1762','1666288582','1','admin','24','10','version','Saving Snippet','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1763','1666288582','1','admin','22','10','version','Editing Snippet','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1764','1666288589','1','admin','76','-','-','Element management','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1765','1666288597','1','admin','300','-','Новый параметр (TV)','Create Template Variable','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1766','1666288621','1','admin','302','-','version','Save Template Variable','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1767','1666288621','1','admin','301','13','version','Edit Template Variable','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36');

INSERT INTO `dy5r_manager_log` VALUES
  ('1768','1666288623','1','admin','27','1','Main page','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1769','1666288641','1','admin','5','1','Main page','Saving resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1770','1666288641','1','admin','27','1','Main page','Editing resource','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1771','1666288647','1','admin','302','13','version','Save Template Variable','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1772','1666288647','1','admin','301','13','version','Edit Template Variable','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36'),
  ('1773','1666289249','1','admin','93','-','-','Backup Manager','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36');

#
# Dumping data for table `dy5r_manager_users`
#

INSERT INTO `dy5r_manager_users` VALUES
  ('1','admin','$P$B0EClQGLefOiwFCcaL084zfwHTr0Br1');

#
# Dumping data for table `dy5r_member_groups`
#

#
# Dumping data for table `dy5r_membergroup_access`
#

#
# Dumping data for table `dy5r_membergroup_names`
#

#
# Dumping data for table `dy5r_site_content`
#

INSERT INTO `dy5r_site_content` VALUES
  ('1','document','text/html','Main page','','','main-page','','1','0','0','0','0','','<p><small>* Онлайн.</small></p>\n<p><small>** Программа &laquo;Автомобиль в рассрочку&raquo;.<br>&laquo;Карта &laquo;Халва&raquo;: Клиентам от 20 до 75 лет по паспорту РФ. Обслуживание &ndash; 0 руб. Ставка в течение льготного периода (36 мес.) - 0% год. Срок рассрочки от 1 до 18 мес. на покупки в сети партнёров с учетом базового срока рассрочки (стандартного срока рассрочки, предоставляемого партнёром Банка) при использовании &laquo;Карта &laquo;Халва&raquo;, срока рассрочки по купонам, акциям, тарифным планам действующим по &laquo;Карта &laquo;Халва&raquo;. Информация действительна на период с 01.10.2022 по 31.10.2022 г. ПАО &laquo;Совкомбанк&raquo;. Генеральная лицензия Банка России № 963 от 05 декабря 2014 года. Не является публичной офертой. Предложение носит информационный характер, не является публичной офертой (ст. 437 ГК РФ). Подробные условия уточняйте в официальном дилерском центре Kia АВТОРУСЬ Бутово. </small></p>\n<p><small> *** Данный интернет-сайт носит информационный характер и не является публичной офертой, определяемой положениями Статьи 437 ГК РФ. Для получения подробной информации обращайтесь в официальный дилерский центр автомобилей KIA ООО &laquo;АВТОРУСЬ БУТОВО&raquo; или по телефону +7 (495) 023-21-06. Специальное предложение действует на покупку нового автомобиля с 01.10.2022 по 31.10.2022 </small></p>\n<p><sup>1</sup><small> Выгоды от дилера достигается при покупке нового автомобиля Kia в период с 01.10.2022 по 31.10.2022 с учетом приобретения автомобиля по маркетинговым программам и/или: Trade-in, Кредит. Предложение ограничено. Подарки могут отличаться в зависимости от выбранной модели и комплектации. Подробности узнавайте в отделе продаж официального дилера Kia АВТОРУСЬ Бутово. Не является публичной офертой. </small></p>\n<p><sup>2</sup><small> Ежемесячный платеж означает размер затрат клиента, взявшего кредит по специальной акции на приобретение нового автомобиля Kia в рамках кредитного продукта. Данное предложение по расчету кредита носит исключительно информационный характер, не является публичной офертой (ст. 437 ГК РФ). Расчет кредита является предварительным, носит ориентировочный характер и подлежит уточнению перед или непосредственно при заключении договоров кредитования/страхования. Доступны иные варианты расчетов при разных параметрах кредита. Информация о ставках кредита и иных параметрах кредитного предложения предоставлена ООО &laquo;Киа Россия и СНГ&raquo;. Общие условия кредитования: валюта кредита рубли РФ, первоначальный взнос от 0% от стоимости автомобиля; срок кредита: от 12 до 60 мес.; процентная ставка банка от 24.7% до 26.1% годовых; минимальная сумма кредита 100 000 руб., максимальная сумма кредита 6 000 000 руб. Обеспечение кредита &ndash; залог автомобиля. Предполагается возможность включения в сумму кредита страховых премий по страхованию жизни и здоровья заемщика. Условия могут быть изменены в одностороннем порядке. Подробные условия кредитования, требования к условиям страхования и заемщикам уточняйте у менеджеров в официальном дилерском центре Kia АВТОРУСЬ Бутово.<br>Предложение в рамках программы лизинга для физических лиц на новые легковые автомобили, приобретенные у официальных дилеров-партнеров банка и лизинговой компании. Параметры программы: срок лизинга &ndash; от 13 до 60 месяцев; авансовый платеж &ndash; от 10% от цены приобретаемого автомобиля; валюта кредита &ndash; рубли РФ; минимальная сумма финансирования по договору лизинга &ndash; 200 000 рублей; максимальная сумма финансирования по договору лизинга &ndash; 4 900 000 рублей, суммы указаны с учетом дополнительных услуг и страхования автомобиля, если они включены в лизинговые платежи.<br>Программой предусмотрено обязательное оформление договора страхования автомобиля от рисков: &laquo;Ущерб&raquo; (а именно: Дорожное происшествие по вине Страхователя, Допущенного лица или неустановленных третьих лиц, Дорожное происшествие по вине установленных третьих лиц, Природные и техногенные факторы, Действие третьих лиц), &laquo;Полная гибель&raquo; и &laquo;Хищение&raquo;.<br>Минимальный пакет документов, необходимый для принятия решения о заключении договора лизинга: паспорт гражданина РФ. В течение срока договора лизинга автомобиль находится в собственности лизинговой компании, регистрация в органах ГИБДД осуществляется за лизингополучателем, страхование ОСАГО осуществляется силами и за счет лизингополучателя. При исполнении всех обязательств по договору лизинга и оплаты выкупного платежа право собственности на автомобиль переходит к лизингополучателю. </small></p>','1','3','0','1','1','1','1130304721','1','1666288641','0','0','0','1130304721','1','','0','0','0','0','1','1'),
  ('2','document','text/html','Сервис','','','service','','1','0','0','0','0','','<p><small>* Предложение действует с 01.10.2022 по 31.10.2022 г. и не является публичной офертой, определяемой положениями Статьи 437 ГК РФ. Скидки по акции не суммируются со скидками по дисконтным картам и другим спецпредложениям. Скидки по акции не действуют на проведение кузовных и малярных работ. Подробности уточняйте в сервисном центре ООО &laquo;АВТОРУСЬ БУТОВО&raquo; по тел.: <span class=\"comagic_phone tel\"> <a class=\"menu__link menu__link_tel\" href=\"tel:+74950232106\">+7(495) 023-21-06</a> </span></small></p>','1','4','0','1','0','1','1665929096','1','1666284725','0','0','0','1665929096','1','','0','0','0','0','0','1'),
  ('3','document','text/html','Models','','','models','','1','0','0','0','1','','','1','0','0','1','0','1','1665931716','1','1666164604','0','0','0','1665931716','1','','0','0','0','0','1','1'),
  ('4','document','text/html','Soul','','','soul','','1','0','0','3','0','','','1','5','3','1','0','1','1665931988','1','1665994549','0','0','0','1665931988','1','','0','0','0','0','0','1'),
  ('5','document','text/html','Sportage','','','sportage','','1','0','0','3','0','','','1','5','1','1','0','1','1665932005','1','1665948887','0','0','0','1665932005','1','','0','0','0','0','0','1'),
  ('6','document','text/html','Rio','','','rio','','1','0','0','3','0','','','1','5','2','1','0','1','1665932045','1','1665994470','0','0','0','1665932045','1','','0','0','0','0','0','1'),
  ('7','document','text/html','Slider','','','slider','','1','0','0','0','1','','','1','0','2','1','0','1','1665999994','1','1666164658','0','0','0','1665999994','1','','0','0','0','0','1','1'),
  ('8','document','text/html','Максимальные выгоды','При покупке Kia. Только до 21.10!','','maksimalnye-vygody','','1','0','0','7','0','','','1','6','1','1','0','1','1666000064','1','1666003732','0','0','0','1666000064','1','','0','0','0','0','0','1'),
  ('9','document','text/html','Счастливый тест драйв с 10.10.22 по 11.11.22','Подробности в отделе продаж','','schastlivyj-test-drajv-s-10.10.22-po-11.11.22','','1','0','0','7','0','','','1','6','2','1','0','1','1666001027','1','1666003721','0','0','0','1666001027','1','','0','0','0','0','0','1'),
  ('10','document','text/html','Месяц подарков','для клиентов сервиса<br>11.10-10.11.22','','mesyac-podarkov','','1','0','0','7','0','Подробности уточняйте в отделе сервиса','','1','6','3','1','0','1','1666001325','1','1666003499','0','0','0','1666001325','1','','0','0','0','0','0','1'),
  ('11','document','text/html','Services','','','services','','1','0','0','0','1','','','1','0','0','1','0','1','1666117456','1','1666117456','0','0','0','1666117456','1','','0','0','0','0','0','1'),
  ('12','document','text/html','Техническое обслуживание','','','tehnicheskoe-obsluzhivanie','','1','0','0','11','0','','','1','8','0','1','0','1','1666117501','1','1666117723','0','0','0','1666117501','1','','0','0','0','0','1','1'),
  ('13','document','text/html','Диагностика','','','diagnostika','','1','0','0','11','0','','','1','8','1','1','0','1','1666117788','1','1666118438','0','0','0','1666117832','1','','0','0','0','0','1','1'),
  ('14','document','text/html','Кузовной ремонт','','','kuzovnoj-remont','','1','0','0','11','0','','','1','8','2','1','0','1','1666118291','1','1666118445','0','0','0','1666118350','1','','0','0','0','0','1','1'),
  ('15','document','text/html','Запасные части и аксессуары','','','zapasnye-chasti-i-aksessuary','','1','0','0','11','0','','','1','8','3','1','0','1','1666118657','1','1666118817','0','0','0','1666118817','1','','0','0','0','0','1','1'),
  ('16','document','text/html','Дополнительное оборудование','','','dopolnitelnoe-oborudovanie','','1','0','0','11','0','','','1','8','4','1','0','1','1666118681','1','1666118785','0','0','0','1666118785','1','','0','0','0','0','1','1'),
  ('17','document','text/html','Шиномонтаж','','','shinomontazh','','1','0','0','11','0','','','1','8','5','1','0','1','1666118698','1','1666118747','0','0','0','1666118747','1','','0','0','0','0','1','1'),
  ('18','document','text/html','Special offers','','','special-offers','','1','0','0','0','1','','','1','0','0','1','0','1','1666163014','1','1666163014','0','0','0','1666163014','1','','0','0','0','0','0','1'),
  ('19','document','text/html','Заправка кондиционера – 3 900 руб.','1 - 31 октября 2022','','zapravka-kondicionera-3-900-rub','','1','0','0','18','0','','<p>Не дожидайтесь пока климат-контроль выйдет из строя. Специалисты рекомендуют периодически заправлять кондиционер в авто, один раз в 2-3 года.</p>\n<p>Стоимость услуги по акции &ndash; 3 900 руб.</p>\n<p>Ждем Вас!</p>','1','9','6','1','0','1','1666163487','1','1666181549','0','0','0','1666163487','1','','0','0','0','0','0','1'),
  ('22','document','text/html','Form','','','form','','1','0','0','23','0','','[!form!]','0','0','6','1','0','1','1666255449','1','1666282811','0','0','0','1666255449','1','','1','0','0','0','1','0'),
  ('20','document','text/html','Замена масла АКПП','1 - 31 октября 2022','','zamena-masla-akpp','','1','0','0','18','0','','<p>В сервисном центре Kia АВТОРУСЬ Бутово действует отличное предложение!</p>\n<p>Замена масла АКПП за 15 500 рублей.</p>\n<p>Ждем Вас!</p>','1','9','1','1','0','1','1666163921','1','1666181504','0','0','0','1666163921','1','','0','0','0','0','0','1'),
  ('21','document','text/html','Акция «Счастливые часы»','1 - 31 октября 2022','','akciya-schastlivye-chasy','','1','0','0','18','0','','<p>Kia АВТОРУСЬ Бутово объявляет акцию &laquo;Счастливые часы&raquo; для клиентов сервисного центра.</p>\n<p>Ищете дополнительную выгоду?</p>\n<p>Приезжайте к нам в будни с 16-00 до 20-00.</p>\n<p><strong>-5%</strong> на работы</p>\n<p><strong>-5%</strong> на запасные части</p>\n<p>Ждем Вас!</p>','1','9','2','1','0','1','1666163999','1','1666181526','0','0','0','1666163999','1','','0','0','0','0','0','1'),
  ('23','document','text/html','System files','','','system-files','','1','0','0','0','1','','','0','0','6','1','0','1','1666282896','1','1666282943','0','0','0','1666282896','1','','1','0','0','0','1','0');

#
# Dumping data for table `dy5r_site_htmlsnippets`
#

INSERT INTO `dy5r_site_htmlsnippets` VALUES
  ('1','head','head','2','none','2','0','<head>\n    <meta http-equiv=\"Content-Type\" content=\"text/html; charset=[(modx_charset)]\" /> \n    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">\n    <title>[*titl*]</title>\n	<meta name=\"keywords\" content=\"[*keyw*]\">\n	<meta name=\"description\" content=\"[*desc*]\">\n	<base href=\"[(site_url)]\">\n    <meta name=\"theme-color\" content=\"#fff\">\n    <meta name=\"apple-mobile-web-app-status-bar-style\" content=\"black-translucent\">\n    <meta name=\"viewport\" content=\"width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0\">\n    <link rel=\"shortcut icon\" href=\"/dist/img/favicons/favicon.ico\" type=\"image/x-icon\">\n    <link rel=\"icon\" sizes=\"16x16\" href=\"/dist/img/favicons/favicon-16x16.png\" type=\"image/png\">\n    <link rel=\"icon\" sizes=\"32x32\" href=\"/dist/img/favicons/favicon-32x32.png\" type=\"image/png\">\n    <link rel=\"apple-touch-icon-precomposed\" href=\"/dist/img/favicons/apple-touch-icon-precomposed.png\">\n    <link rel=\"apple-touch-icon\" href=\"/dist/img/favicons/apple-touch-icon.png\">\n    <link rel=\"apple-touch-icon\" sizes=\"57x57\" href=\"/dist/img/favicons/apple-touch-icon-57x57.png\">\n    <link rel=\"apple-touch-icon\" sizes=\"60x60\" href=\"/dist/img/favicons/apple-touch-icon-60x60.png\">\n    <link rel=\"apple-touch-icon\" sizes=\"72x72\" href=\"/dist/img/favicons/apple-touch-icon-72x72.png\">\n    <link rel=\"apple-touch-icon\" sizes=\"76x76\" href=\"/dist/img/favicons/apple-touch-icon-76x76.png\">\n    <link rel=\"apple-touch-icon\" sizes=\"114x114\" href=\"/dist/img/favicons/apple-touch-icon-114x114.png\">\n    <link rel=\"apple-touch-icon\" sizes=\"120x120\" href=\"/dist/img/favicons/apple-touch-icon-120x120.png\">\n    <link rel=\"apple-touch-icon\" sizes=\"144x144\" href=\"/dist/img/favicons/apple-touch-icon-144x144.png\">\n    <link rel=\"apple-touch-icon\" sizes=\"152x152\" href=\"/dist/img/favicons/apple-touch-icon-152x152.png\">\n    <link rel=\"apple-touch-icon\" sizes=\"167x167\" href=\"/dist/img/favicons/apple-touch-icon-167x167.png\">\n    <link rel=\"apple-touch-icon\" sizes=\"180x180\" href=\"/dist/img/favicons/apple-touch-icon-180x180.png\">\n    <link rel=\"apple-touch-icon\" sizes=\"1024x1024\" href=\"/dist/img/favicons/apple-touch-icon-1024x1024.png\">\n\n    <link rel=\"stylesheet\" type=\"text/css\" href=\"/dist/libs/slick-1.8.1/slick.css\"/>\n    <link rel=\"stylesheet\" type=\"text/css\" href=\"/dist/libs/slick-1.8.1/slick-theme.css\"/>\n    <link rel=\"stylesheet\" type=\"text/css\" href=\"/dist/libs/magnific-popup/magnific-popup.css\">\n    <link rel=\"stylesheet\" type=\"text/css\" href=\"/dist/libs/select2/css/select2.min.css\">\n    <script type=\"text/javascript\" src=\"/dist/libs/jquery-3.5.1.min.js\"></script>\n    <script type=\"text/javascript\" src=\"/dist/libs/slick-1.8.1/slick.min.js\"></script>\n    <script type=\"text/javascript\" src=\"/dist/libs/jquery.inputmask.min.js\"></script>\n    <script src=\"/dist/libs/magnific-popup/jquery.magnific-popup.min.js\"></script>\n    <script src=\"/dist/libs/select2/js/select2.min.js\"></script>\n    <link rel=\"stylesheet\" href=\"/dist/styles/main.css[!version!]\">\n</head>\n','0','0','1665861184','0'),
  ('2','mm_rules','Default ManagerManager rules.','0','none','3','0','// more example rules are in assets/plugins/managermanager/example_mm_rules.inc.php\n// example of how PHP is allowed - check that a TV named documentTags exists before creating rule\n\nif ($modx->db->getValue($modx->db->select(\'count(id)\', $modx->getFullTableName(\'site_tmplvars\'), \"name=\'documentTags\'\"))) {\n	mm_widget_tags(\'documentTags\', \' \'); // Give blog tag editing capabilities to the \'documentTags (3)\' TV\n}\nmm_widget_showimagetvs(); // Always give a preview of Image TVs\n\nmm_createTab(\'SEO\', \'seo\', \'\', \'\', \'\', \'\');\nmm_moveFieldsToTab(\'titl,keyw,desc,seoOverride,noIndex,sitemap_changefreq,sitemap_priority,sitemap_exclude\', \'seo\', \'\', \'\');\nmm_widget_tags(\'keyw\',\',\'); // Give blog tag editing capabilities to the \'documentTags (3)\' TV\n\n\n//mm_createTab(\'Images\', \'photos\', \'\', \'\', \'\', \'850\');\n//mm_moveFieldsToTab(\'images,photos\', \'photos\', \'\', \'\');\n\n//mm_hideFields(\'longtitle,description,link_attributes,menutitle,content\', \'\', \'6,7\');\n\n//mm_hideTemplates(\'0,5,8,9,11,12\', \'2,3\');\n\n//mm_hideTabs(\'settings, access\', \'2\');\n','0','0','0','0'),
  ('3','header','header','2','none','2','0','<header class=\"header\">\n    <div class=\"header__inner\">\n        <a href=\"/\" class=\"header__logo\">\n            <img src=\"/dist/img/svg/logo.svg\" alt=\"\">\n        </a>\n        <div class=\"header__dealer\">\n            <p class=\"header__dealer-title\">Kia АВТОРУСЬ Бутово</p>\n            <p class=\"header__dealer-text\">Официальный дилер Kia</p>\n        </div>\n        <div class=\"header__good-place\">\n			<img src=\"/dist/img/content/good-place.png\" alt=\"\">\n		</div>\n        <div class=\"header__contacts\">\n            <p class=\"header__address\">г. Москва, Южное Бутово, Чечерский проезд, 1\n            </p>\n            <a href=\"tel:+74957170707\"><span>+7 (495) 717-07-07</span></a>\n            <button class=\"btn btn_dark header__contacts-btn js-popup-link\" data-mfp-src=\"#modal-call\">\n                <span>заказать звонок</span>\n            </button>\n        </div>\n\n        <div class=\"header__phone\">\n            <a href=\"tel:+74957170707\"><span>+7 (495) 717-07-07</span></a>\n        </div>\n\n        <button class=\"header__burger js-header-burger\">\n            <span></span>\n        </button>\n    </div>\n</header>','0','1665859522','1665859601','0'),
  ('4','footer','footer','2','none','2','0','<footer class=\"footer\">\n    <div class=\"footer__inner\">\n        <div class=\"footer__row\">\n            <a href=\"/\" class=\"footer__logo\">\n                <img src=\"/dist/img/svg/logo2.svg\" alt=\"Logo\">\n            </a>\n            <div class=\"footer__dealer\">\n                <p class=\"footer__dealer-title\">Kia АВТОРУСЬ Бутово</p>\n                <p class=\"footer__dealer-text\">Официальный дилер Kia</p>\n            </div>\n        </div>\n\n        <div class=\"footer__row footer__row_beetwen\">\n            <ul class=\"footer__nav\">\n                <?php\n                $anchorValue = \'\';\n                $anchorClass = \'js-anchor\';\n                if ($_SERVER[\'REQUEST_URI\'] == \'/\') {\n                    $anchorClass = \'js-anchor\';\n                } else {\n                    $anchorClass = \'\';\n                    $anchorValue = \'/\';\n                }\n\n                ?>\n                <li class=\"footer__nav-item\"><a href=\"<?= $anchorValue ?>#models-nav\"\n                                                class=\"<?= $anchorClass ?>\" data-height=\"150\">Модели</a></li>\n                <li class=\"footer__nav-item\"><a href=\"javascript: void(0);\" class=\"js-popup-link\"\n                                                data-mfp-src=\"#modal-call\" data-height=\"150\">Автомобили с пробегом</a>\n                </li>\n                <li class=\"footer__nav-item\"><a href=\"<?= $anchorValue ?>#trade-in\"\n                                                class=\"<?= $anchorClass ?>\" data-height=\"-50\">Трейд-Ин</a></li>\n                <li class=\"footer__nav-item\"><a href=\"/service\" data-height=\"150\">Сервис и запчасти</a></li>\n                <li class=\"footer__nav-item\"><a href=\"<?= $anchorValue ?>#contacts\" data-height=\"150\"\n                                                class=\"<?= $anchorClass ?>\">Контакты</a></li>\n            </ul>\n            <div class=\"footer__phone\">\n                <div class=\"footer__phone-text\">г. Москва, Южное Бутово, Чечерский проезд, 1\n                </div>\n                <span>+7 (495) 717-07-07</span>\n            </div>\n        </div>\n        <div class=\"footer__row footer__row_beetwen\">\n            <div class=\"footer__text footer__text_first\">\n                <p>© 2022 ООО «АВТОРУСЬ БУТОВО» <br><br>\n                    Фактический адрес: г. Москва, Чечерский проезд, 1; <br>\n                    Телефон: <a href=\"tel:+74951518673\">+7 (495) 151-86-73</a>; <br>\n                    ИНН: 7728588775; ОГРН: 1067746805983<br><br>\n                    Bедёт деятельность на территории РФ в соответствии с законодательством РФ. Реализуемые товары\n                    доступны к получению на территории РФ.<br><br>\n                    Информация о соответствующих моделях и комплектациях и их наличии, ценах, возможных выгодах и\n                    условиях приобретения доступна в дилерском центре Kia АВТОРУСЬ Бутово.\n                </p>\n            </div>\n            <div class=\"footer__wrapper\">\n                <button class=\"btn btn_dark js-popup-link\" data-mfp-src=\"#modal-call\"><span>Заказать звонок</span>\n                </button>\n                <div class=\"footer__social\">\n                    <a href=\"https://vk.com/kia_avtoruss\" target=\"_blank\"><img src=\"/dist/img/svg/vk.svg\"\n                                                                               alt=\"Vkontakte\"></a>\n                    <a href=\"https://t.me/kia_avtoruss\" target=\"_blank\"><img src=\"/dist/img/svg/tg.svg\" alt=\"Telegram\"></a>\n                    <a href=\"https://ok.ru/group/51165601923145\" target=\"_blank\"><img src=\"/dist/img/svg/ok.svg\"\n                                                                                      alt=\"Odnoklassniki\"></a>\n                </div>\n            </div>\n        </div>\n        <div class=\"footer__row footer__row_beetwen\">\n            <div class=\"footer__sites\">\n                <a href=\"/\" target=\"_blank\" class=\"footer__text\">kia.ru</a>\n                <a href=\"https://kia-butovo.ru/info/\" target=\"_blank\" class=\"footer__text\">Правовая информация</a>\n            </div>\n            <p class=\"footer__text\">© 2022 ООО «АВТОРУСЬ БУТОВО» </p>\n        </div>\n    </div>\n</footer>\n<script src=\"https://api-maps.yandex.ru/2.1/?lang=ru_RU&amp;apikey=954b3589-21f3-440c-a50c-a398138d206b\"\n        type=\"text/javascript\"></script>\n<script src=\"/dist/js/main.js[!version!]\"></script>\n','0','1665859977','1665861224','0'),
  ('5','nav_links','navigation links','2','none','0','0','<nav class=\"nav js-nav\">\n    <div class=\"nav__dealer\">\n        <p class=\"nav__dealer-title\">Kia АВТОРУСЬ Бутово</p>\n        <p class=\"nav__dealer-text\">Официальный дилер Kia</p>\n    </div>\n    <ul class=\"nav__list container\">\n        <li class=\"nav__list-item\">\n            <a href=\"#stock\" class=\"js-anchor auto\" data-height=\"150\">Авто в наличии</a>\n        </li>\n        <li class=\"nav__list-item\">\n            <a href=\"#models-nav\" class=\"js-anchor auto\" data-height=\"150\">Модели</a>\n        </li>\n        <li class=\"nav__list-item\">\n            <a href=\"#trade-in\" class=\"js-anchor auto\" data-height=\"-50\">Трейд-Ин</a>\n        </li>\n        <li class=\"nav__list-item\">\n            <a href=\"javascript: void(0);\" class=\"js-popup-link\" data-mfp-src=\"#modal-call\" data-height=\"150\">Автомобили с пробегом</a>\n        </li>\n        <li class=\"nav__list-item\">\n            <a href=\"/service\" class=\"\" data-height=\"150\">Сервис и запчасти</a>\n        </li>\n        <li class=\"nav__list-item\">\n            <a href=\"#contacts\" class=\"js-anchor auto\" data-height=\"150\">Контакты</a>\n        </li>\n    </ul>\n\n    <p class=\"nav__address\">г. Москва, Южное Бутово, Чечерский проезд, 1\n    </p>\n</nav>','0','1665861803','1666264764','0'),
  ('6','model_item','','2','none','0','0','<div id=\"model-item-[+id+]\" class=\"models__item js-model-item [+dl.class+]\" data-model=\"[+alias+]\">\n    <div class=\"models__item-col models__item__benefits\">\n        <div class=\"models__head\">\n            <h3 class=\"models__title\">[+pagetitle+]</h3>\n        </div>\n        <div class=\"models__gift\">\n            <div class=\"models__gift-item\">\n                <div class=\"models__gift-icon\">\n                    <img src=\"/dist/img/svg/gift-black.svg\" alt=\"Выгоды от дилера\">\n                </div>\n                <a href=\"#disclaimer\" data-model=\"Soul\" data-height=\"150\" class=\"js-anchor\">\n                    <div class=\"models__gift-text\">Выгоды от дилера<sup>1</sup></div>\n                </a>\n            </div>\n        </div>\n        \n		[!multiTV?\n		&tvName=`model_benefit`\n		&docid=`[+id+]`\n		&tplConfig=``\n		&outerTpl=`@CODE:<div class=\"models__scope\">[+wrapper+]</div>`\n		&rowTpl=`@CODE:<div class=\"models__scope-item [+row.class+]\">\n		<div class=\"models__scope-key\">[+key+]</div>\n		<div class=\"models__scope-val\">[+value+]</div>\n		</div>`\n		&display=`all`\n		&offset=`0`\n		&rows=`all`\n		&randomize=`0`\n		&reverse=`0`\n		&toJson=`0`\n		&published=`1`\n		&emptyOutput=`1`\n		&evenClass=`even`\n		&oddClass=`odd`\n		&paginate=`0`\n		&offsetKey=`page`\n		!]\n        \n        <div class=\"models__buttons\">\n            <button class=\"btn btn_dark btn_yellow js-popup-link\" data-mfp-src=\"#modal-call\">\n                <span>Получить выгоду</span>\n            </button>\n            <button class=\"btn btn_light btn_light_yellow js-popup-link\" data-mfp-src=\"#modal-call\">\n                <span>Узнать цену по акции</span>\n            </button>\n        </div>\n    </div>\n    <div class=\"models__item-col models__item__special-price\">\n        <div class=\"models__special\">\n            <div class=\"models__gift-icon models__special-icon\"><img src=\"/dist/img/svg/label.svg\" alt=\"\"></div>\n            <div class=\"models__special-text models__gift-text\">Специальная цена. Только до 21.10!</div>\n        </div>\n        <div class=\"models__img\">\n            <picture>\n                <img src=\"[+tv.model_item_img+][!version!]\" alt=\"[+pagetitle+]\" loading=\"lazy\">\n            </picture>\n        </div>\n    </div>\n</div>','0','1665943790','1666121099','0'),
  ('7','models_nav','','2','none','0','0','<section class=\"section section_01\" id=\"models-nav\">\n        <div class=\"container\">\n            <div class=\"tab\">\n                <ul class=\"tab__list\">\n                    <li><span class=\"js-tab-item tab__item active\" data-model=\"all\">Все</span</li>\n					[!DocLister? &parents=`3`&tpl=`models_nav_item`!]\n                </ul>\n            </div>\n        </div>\n    </section>','0','1665950055','1666279222','0'),
  ('8','models_nav_item','','2','none','0','0','<li><a href=\"#model-item-[+id+]\" class=\"tab__item js-tab-item js-anchor\" data-model=\"[+pagetitle+]\" data-height=\"150\">[+pagetitle+]</a></li>','0','1665950149','1666284205','0'),
  ('9','timer_form','Timer and callback form','2','none','0','0','<div class=\"intro__bottom container\">\n            <div class=\"intro__bottom-wrap\">\n                <div class=\"intro__bottom-item\">\n                    <h3 class=\"intro__bottom-title\">\n                        Успейте получить выгоду!\n                    </h3>\n                    <p class=\"intro__bottom-text\">\n                        До конца спецпредложения осталось:\n                    </p>\n                </div>\n                <div class=\"intro__bottom-item\">\n                    <div class=\"timer js-timer\" data-day=\"7\">\n                        <div class=\"timer__item\">\n                            <span class=\"timer__numb js-timer-num\">00</span>\n                            <span class=\"timer__text\">дней</span>\n                        </div>\n                        <div class=\"timer__dot\"></div>\n                        <div class=\"timer__item\">\n                            <span class=\"timer__numb js-timer-num\">00</span>\n                            <span class=\"timer__text\">часов</span>\n                        </div>\n                        <div class=\"timer__dot\"></div>\n                        <div class=\"timer__item\">\n                            <span class=\"timer__numb js-timer-num\">00</span>\n                            <span class=\"timer__text\">минут</span>\n                        </div>\n                        <div class=\"timer__dot\"></div>\n                        <div class=\"timer__item\">\n                            <span class=\"timer__numb js-timer-num\">00</span>\n                            <span class=\"timer__text\">секунд</span>\n                        </div>\n                    </div>\n                </div>\n                <div class=\"intro__bottom-item\">\n                    <form class=\"form intro__form js-form js-ajax-form\"\n                          data-id=\"form-application\">\n						<input type=\"hidden\" name=\"formid\" value=\"basic\">\n                        <input type=\"hidden\" name=\"type\" value=\"form\">\n                        <input type=\"hidden\" name=\"phone_manager\" value=\"\">\n                        <input type=\"hidden\" name=\"form_key\" value=\"callback\">\n                        <input type=\"hidden\" name=\"form_name\" value=\"Заказать звонок\">\n                        <fieldset>\n                            <div class=\"intro__form-row\">\n                                <label for=\"phone\" class=\"form__label required\">\n                                    <input type=\"tel\" name=\"phone\" id=\"phone\" class=\"js-form-input\"\n                                           placeholder=\"Ваш телефон\">\n                                </label>\n                                <button class=\"btn btn_dark form__btn js-form-submit\" type=\"submit\">\n                                    <div class=\"lds-dual-ring btn__spin\"></div>\n                                    <span>Оставить заявку</span>\n                                </button>\n                            </div>\n                            <label for=\"policy\" class=\"form__check\">\n                                <input type=\"checkbox\" hidden id=\"policy\" name=\"policy\" class=\"js-policy\"\n                                       checked=\"checked\">\n                                <span class=\"form__check-box\">\n                                <img src=\"/dist/img/svg/checkmark.svg\" alt=\"\">\n                            </span>\n                                <p class=\"intro__form__policy\">\n                                    Нажимая кнопку «Заказать», я даю согласие на обработку своих\n                                    <a href=\"/\" target=\"_blank\">персональных данных</a>\n                                </p>\n                            </label>\n                        </fieldset>\n                    </form>\n                </div>\n            </div>\n        </div>','0','1665995151','1666286391','0'),
  ('10','main_slider','Main top slider','2','none','8','0','<div class=\"intro__slider js-intro-slider\" data-arrows=\"./dist/img/svg/s-prev.svg, ./dist/img/svg/s-next.svg\">\n	[!DocLister? &parents=`7`\n	&tvList=`desktop_img, mobile_img, black_text`\n	&tpl=`slider_item`\n	&sortBy=`menuindex`\n	&sortDir=`ASC`\n	!]\n</div>','0','1665995238','1666004211','0'),
  ('12','stock','Stock list','2','none','9','0','<section class=\"section section_02\" id=\"stock\">\n    <div class=\"container\">\n        <h2 class=\"section__title\">Автомобили в наличии</h2>\n        <div class=\"stock\">\n            <div class=\"stock__head\">\n                <form class=\"form stock__form\">\n                    <label for=\"model\" class=\"form__label\">\n                        <select name=\"model\" id=\"model\" class=\"js-form-select\">\n                            <option>Все модели</option>\n                        </select>\n                    </label>\n                    <label for=\"complectation\" class=\"form__label\">\n                        <select name=\"complectation\" id=\"complectation\" class=\"js-form-select\">\n                            <option>Комплектация</option>\n                        </select>\n                    </label>\n                    <label for=\"engine\" class=\"form__label\">\n                        <select name=\"engine\" id=\"engine\" class=\"js-form-select\">\n                            <option>Двигатель</option>\n                        </select>\n                    </label>\n                    <label for=\"color\" class=\"form__label\">\n                        <select name=\"color\" id=\"color\" class=\"js-form-select\">\n                            <option>Цвет</option>\n                        </select>\n                    </label>\n                </form>\n            </div>\n            <ul class=\"stock__list js-stock-list\">\n<!--сток-->\n            </ul>\n            <div class=\"model__not-available\"></div>\n        </div>\n</section>','0','1666005789','1666005789','0'),
  ('13','advantages','','2','none','5','0','<section class=\"section section_03\" id=\"service\">\n    <div class=\"container\">\n        <div class=\"odds\">\n            <h2 class=\"section__title\">Преимущества</h2>\n            <div class=\"odds\">\n                <div class=\"odds__wrap\">\n                    <div class=\"odds__item js-popup-link\" data-mfp-src=\"#modal-call\">\n                        <div class=\"odds__icon\">\n                            <img src=\"/dist/img/svg/icon_1.svg\" alt=\"\">\n                        </div>\n                        <div class=\"odds__text\"><p>Более 35 лет на рынке</p></div>\n                    </div>\n                    <div class=\"odds__item js-popup-link\" data-mfp-src=\"#modal-call\">\n                        <div class=\"odds__icon\">\n                            <img src=\"/dist/img/svg/icon_2.svg\" alt=\"\">\n                        </div>\n                        <div class=\"odds__text\"><p>Авто с ПТС</p></div>\n                    </div>\n                    <div class=\"odds__item js-popup-link\" data-mfp-src=\"#modal-call\">\n                        <div class=\"odds__icon\">\n                            <img src=\"/dist/img/svg/icon_3.svg\" alt=\"\">\n                        </div>\n                        <div class=\"odds__text\"><p>Выгодный трейд-ин</p></div>\n                    </div>\n                    <div class=\"odds__item js-popup-link\" data-mfp-src=\"#modal-call\">\n                        <div class=\"odds__icon\">\n                            <img src=\"/dist/img/svg/icon_4.svg\" alt=\"\">\n                        </div>\n                        <div class=\"odds__text\"><p> Выгодные условия по кредиту</p></div>\n                    </div>\n                    <div class=\"odds__item js-popup-link\" data-mfp-src=\"#modal-call\">\n                        <div class=\"odds__icon\">\n                            <img src=\"/dist/img/svg/icon_5.svg\" alt=\"\">\n                        </div>\n                        <div class=\"odds__text\"><p>Крытый склад </p></div>\n                    </div>\n                    <div class=\"odds__item js-popup-link\" data-mfp-src=\"#modal-call\">\n                        <div class=\"odds__icon\">\n                            <img src=\"/dist/img/svg/icon_6.svg\" alt=\"\">\n                        </div>\n                        <div class=\"odds__text\"><p>Страхование на спец.условиях </p></div>\n                    </div>\n                    <div class=\"odds__item js-popup-link\" data-mfp-src=\"#modal-call\">\n                        <div class=\"odds__icon\">\n                            <img src=\"/dist/img/svg/icon_7.svg\" alt=\"\">\n                        </div>\n                        <div class=\"odds__text\"><p>Оригинальные запчасти в наличии и под заказ </p></div>\n                    </div>\n                    <div class=\"odds__item js-popup-link\" data-mfp-src=\"#modal-call\">\n                        <div class=\"odds__icon\">\n                            <img src=\"/dist/img/svg/icon_8.svg\" alt=\"\">\n                        </div>\n                        <div class=\"odds__text\"><p>Полный парк тест-драйва</p></div>\n                    </div>\n                </div>\n            </div>\n        </div>\n    </div>\n</section>','0','1666006213','1666006213','0'),
  ('11','slider_item','Banner','2','none','8','0','<div class=\"intro__slider-item\">\n	<div class=\"intro__img\">\n		<picture>\n			<source media=\"(max-width: 768px)\" srcset=\"[+tv.mobile_img+][!version!]\">\n			<img src=\"[+tv.desktop_img+][!version!]\" alt=\"Kia АВТОРУСЬ Бутово\">\n		</picture>\n	</div>\n	<div class=\"intro__content container\">\n		<div class=\"intro__content-inner\">\n			<h1 class=\"intro__title [[if? &is=`[+tv.black_text+]:=:true` &then=`intro__title-black`]]\">[+pagetitle+]</h1>\n			<p class=\"intro__text [[if? &is=`[+tv.black_text+]:=:true` &then=`intro__text-black`]]\">[+longtitle+]</p>\n			<p class=\"intro__text intro__text-small [[if? &is=`[+tv.black_text+]:=:true` &then=`intro__text-black`]]\">[+introtext+]</p>\n			\n		</div>\n	</div>\n</div>','0','1666000149','1666003405','0'),
  ('14','trade_in_section','','2','none','5','0','<section class=\"section section_03\" id=\"trade-in\">\n    <div class=\"trade-in\">\n        <div class=\"trade-in__wrap\">\n            <div class=\"trade-in__item\">\n                <div class=\"trade-in__content trade-in__content_first\">\n                    <h2 class=\"section__title trade-in__title\">\n                        Воспользуйся программой Trade-in Kia\n                    </h2>\n                    <p class=\"trade-in__text\">Узнайте больше о предложении трейд-ин программы в нашей дилерском центе</p>\n                    <button class=\"btn btn_light js-popup-link\" data-mfp-src=\"#modal-call\"><span>Заказать звонок</span></button>\n                </div>\n            </div>\n            <div class=\"trade-in__item\">\n                <img src=\"/dist/img/content/ban2.webp\" alt=\"Воспользуйся программой Trade-in Kia\" loading=\"lazy\">\n            </div>\n        </div>\n        <div class=\"trade-in__wrap\" id=\"auto-stock\">\n            <div class=\"trade-in__item\">\n                <img src=\"/dist/img/content/ban3.webp\" alt=\"Кредитные условия\" loading=\"lazy\">\n            </div>\n            <div class=\"trade-in__item\">\n                <div class=\"trade-in__content trade-in__content_second\">\n                    <h2 class=\"section__title trade-in__title\">Кредитные условия</h2>\n                    <p class=\"trade-in__text\">Выгодные кредитные условия банков-партнеров с максимальным комфортом помогут вам стать владельцем Kia</p>\n                    <div class=\"trade-in__cost\">\n                        <p class=\"trade-in__cost-text\">Первоначальный взнос от </p>\n                        <p class=\"trade-in__cost-numb\">250 000 ₽</p>\n                    </div>\n                    <button class=\"btn btn_light js-popup-link\" data-mfp-src=\"#modal-call\"><span>Получить предложение</span></button>\n                </div>\n            </div>\n        </div>\n    </div>\n</section>\n','0','1666006314','1666006314','0'),
  ('15','map_contacts','','2','none','5','0','<section class=\"section\" id=\"contacts\">\n    <div class=\"map map-2 service-map\">\n        <div class=\"map__wrap\">\n            <div class=\"map__contacts\">\n                <h2 class=\"section__title map__title\">Наши контакты</h2>\n\n                <div class=\"map__contacts-item\">\n                    <p class=\"map__contacts-key\">Адрес</p>\n                    <p class=\"map__contacts-val\">г. Москва, Южное Бутово, Чечерский проезд, 1\n                    </p>\n                </div>\n                <div class=\"map__contacts-item\">\n                    <p class=\"map__contacts-key\">Телефон</p>\n                    <p class=\"map__contacts-val\"><a href=\"tel:+74957170707\"><span>+7 (495) 717-07-07</span></a></p>\n                </div>\n                <div class=\"map__contacts-item\">\n                    <p class=\"map__contacts-key\">Режим работы</p>\n                    <p class=\"map__contacts-val\">Ежедневно с 08.00 до 21.00</p>\n                </div>\n                <button class=\"btn btn_dark js-popup-link\" data-mfp-src=\"#modal-call\"><span>Заказать звонок</span></button>\n            </div>\n            <div class=\"map__container\" id=\"ymaps\"></div>\n        </div>\n    </div>\n</section>','0','1666006435','1666006435','0'),
  ('16','main_dasclaimer','Disclaimer','2','none','0','0','<div class=\"disclaimer\">\n    <div class=\"disclaimer__container container\">\n        <div class=\"disclaimer__title js-disclaimer-service\">Дисклеймер</div>\n        <div class=\"disclaimer__body-service js-disclaimer-service-body\">\n            [*content*]\n        </div>\n    </div>\n</div>\n','0','1666006656','1666006853','0'),
  ('17','service_nav','Service navigation links','2','none','10','0','<div class=\"service-nav\">\n    <div class=\"service-nav__container container container__alt\">\n        <nav class=\"service-nav__list\">\n            <a href=\"#service\" class=\"service-nav__item js-service-nav\">\n                <div class=\"service-nav__icon\">\n                    <img src=\"./dist/img/service/icon/repairing-service.svg\" alt=\"\">\n                </div>\n                <div class=\"service-nav__text\">Наши услуги</div>\n            </a>\n\n            <a href=\"#to\" class=\"service-nav__item js-service-nav\">\n                <div class=\"service-nav__icon\">\n                    <img src=\"./dist/img/service/icon/shopping-list.svg\" alt=\"\">\n                </div>\n                <div class=\"service-nav__text\">Записаться на ТО</div>\n            </a>\n\n            <a href=\"#special\" class=\"service-nav__item js-service-nav\">\n                <div class=\"service-nav__icon\">\n                    <img src=\"./dist/img/service/icon/percentage.svg\" alt=\"\">\n                </div>\n                <div class=\"service-nav__text\">Специальные предложения\n                </div>\n            </a>\n\n            <a href=\"#contacts\" class=\"service-nav__item js-service-nav\">\n                <div class=\"service-nav__icon\">\n                    <img src=\"./dist/img/service/icon/contact.svg\" alt=\"\">\n                </div>\n                <div class=\"service-nav__text\">Контакты</div>\n            </a>\n        </nav>\n    </div>\n</div>','0','1666116509','1666116509','0'),
  ('18','service_slider_form','Slider form','2','none','10','0','<div class=\"first-screen__inner\">\n        <div class=\"first-screen__body\">\n            <h1 class=\"first-screen__title\">Хотите записаться на сервис?\n            </h1>\n            <div class=\"first-screen__text\">Оставьте заявку, наш специалист перезвонит и запишет вас на сервис в удобное\n                для вас время.\n            </div>\n            <form class=\"first-screen__form js-form js-ajax-form\" method=\"POST\" data-id=\"form-application\" data-callkeeper_name=\"Хотите записаться на сервис?\">\n				<input type=\"hidden\" name=\"formid\" value=\"basic\">\n                <input type=\"hidden\" name=\"type\" value=\"form\">\n                <input type=\"hidden\" name=\"phone_manager\" value=\"\">\n                <input type=\"hidden\" name=\"form_key\" value=\"callback\">\n                <input type=\"hidden\" name=\"form_name\" value=\"Заказать звонок\">\n                <div class=\"first-screen__row required\">\n                    <div class=\"first-screen__field required\">\n                        <input type=\"tel\" class=\"first-screen__input form-contro js-form-inputl\" name=\"phone\" placeholder=\"Введите телефон\" data-callkeeper=\"tel\" inputmode=\"text\">\n                    </div>\n                </div>\n                <div class=\"form__row required\">\n                    <label for=\"policy_intro\" class=\"form__check\">\n                        <input type=\"checkbox\" hidden=\"\" id=\"policy_intro\" name=\"policy_intro\" class=\"js-policy\" checked=\"checked\">\n                        <span class=\"form__check-box\">\n                            <img src=\"/dist/img/svg/checkmark.svg\" alt=\"\">\n                        </span>\n                        <p class=\"intro__form__policy\">\n                            Я даю согласие на обработку своих <a href=\"javascript:void(0);\" data-toggle=\"collapse\" data-target=\".collapse_reserve\" aria-expanded=\"false\" aria-controls=\"collapseExample\">персональных данных</a>\n                        </p>\n                    </label>\n                </div>\n                <input type=\"hidden\" name=\"request_token\" value=\"\">\n                <input type=\"hidden\" name=\"request_action\" value=\"service-banner\">\n                <input type=\"hidden\" name=\"request_type\" value=\"form\">\n                <input type=\"hidden\" name=\"replace_number\" value=\"\">\n                <div class=\"first-screen__row\">\n                    <div class=\"first-screen__field\">\n                        <button type=\"submit\" class=\"first-screen__button\">Записаться на сервис</button>\n                    </div>\n                </div>\n            </form>\n        </div>\n    </div>','0','1666116577','1666286338','0'),
  ('19','service_slider','Service top slider','2','none','10','0','<div class=\"intro__slider\">\n	<picture>\n		<source media=\"(max-width: 768px)\" srcset=\"[*mobile_img*]\">\n		<img src=\"[*desktop_img*]\" alt=\"Kia АВТОРУСЬ Бутово\">\n	</picture>\n</div>','0','1666116629','1666285098','0'),
  ('20','services_list','our services','2','none','10','0','<div class=\"our-service\" id=\"service\">\n    <div class=\"our-service__container container\">\n        <h2 class=\"our-service__title\">Наши услуги</h2>\n        <div class=\"our-service__list js-service-slider\">\n            [!DocLister? \n			&parents=`11`\n			&tvList=`desktop_img`\n			&tpl=`services_item`\n			&sortBy=`menuindex`\n			&sortDir=`ASC`\n			!]\n            <div class=\"our-service__item our-service__item_last\">\n                <div class=\"our-service__item-in\">\n                    <div class=\"our-service__body\">\n\n                        <div class=\"our-service__item-title\">\n                            Хотите записаться на сервис?\n                        </div>\n                        <div class=\"our-service__item-text\">\n                            Оставьте заявку, наш специалист\n                            перезвонит и запишет вас на\n                            сервис в удобное для вас время.\n                        </div>\n                    </div>\n                    <div class=\"our-service__button\" data-toggle=\"modal\" data-target=\"#service-modal\">Записаться</div>\n                </div>\n            </div>\n        </div>\n    </div>\n</div>','0','1666117048','1666118609','0'),
  ('21','services_item','our services item','2','none','10','0','<div class=\"our-service__item\">\n	<div class=\"our-service__item-in\">\n		<div class=\"our-service__body\">\n			<img src=\"[+tv.desktop_img+]\" alt=\"[+pagetitle+]\">\n			<div class=\"our-service__item-title\">\n				[+pagetitle+]\n			</div>\n		</div>\n		<div class=\"our-service__button  js-popup-link\" data-mfp-src=\"#modal-call\" data-value=\'[+pagetitle+]\' data-input=\'service\'>\n			Узнать цену\n		</div>\n	</div>\n</div>','0','1666117347','1666117865','0'),
  ('22','appointment_to','','2','none','0','0','<div class=\"technical-inspection\" id=\"to\">\n    <div class=\"technical-inspection__container container\">\n        <div class=\"technical-inspection__title\">Записаться на ТО</div>\n        <div class=\"technical-inspection__subtitle\">\n            <div class=\"technical-inspection__subtitle-in\">\n                Выберите модель для записи на ТО\n            </div>\n        </div>\n		[!multiTV?\n		&tvName=`appointment_to`\n		&docid=`[*id*]`\n		&tplConfig=``\n		&outerTpl=`@CODE:<div class=\"technical-inspection__list js-service-slider\">[+wrapper+]</div>`\n		&rowTpl=`@CODE:<div class=\"technical-inspection__item\">\n                    <img src=\"[+image+]\" alt=\"[+title+]\">\n                    <div class=\"technical-inspection__model\">[+title+]</div>\n                    <div class=\"technical-inspection__button js-popup-link\" \n						 data-mfp-src=\"#modal-call\" \n						 data-toggle=\"modal\" \n						 data-target=\"#to-modal\" \n						 data-value=\"[+title+]\" \n						 data-input=\"car\">Записаться на ТО\n                    </div>\n                </div>`\n		&display=`all`\n		&offset=`0`\n		&rows=`all`\n		&randomize=`0`\n		&reverse=`0`\n		&orderBy=``\n		&toPlaceholder=``\n		&toJson=`0`\n		&published=`1`\n		&emptyOutput=`1`\n		&noResults=``\n		&outputSeparator=``\n		&firstClass=`first`\n		&lastClass=`last`\n		&evenClass=``\n		&oddClass=``\n		&paginate=`0`\n		&offsetKey=`page`\n		&prepare=``\n		&prepareWrap=``\n		!]\n    </div>\n</div>','0','1666119294','1666162723','0'),
  ('23','service_offer_item','Service offer item','2','none','11','0','<div class=\"special__item  js-popup-link\" \n	 data-mfp-src=\"#modal-special-call\" \n	 data-target=\"#action-[+id+]\" \n	 data-value=\'[+pagetitle+]\' \n	 data-input=\'action\'>\n	<div class=\"special__item-in\">\n		<img src=\"[+tv.desktop_img+]\" alt=\"\">\n	</div>\n	<div class=\"special__text-part\">\n		<div class=\"special__data\">[+longtitle+]</div>\n		<div class=\"special__name\">[+pagetitle+]</div>\n	</div>\n	<div class=\"hidden-text js-popup-text\">[+content+]</div>\n</div>','0','1666163370','1666180341','0'),
  ('24','service_offers_list','','2','none','11','0','<div class=\"special\" id=\"special\">\n   <div class=\"container\">\n        <div class=\"special__title\">Специальные предложения</div>\n        <div class=\"special__body\">\n			[!DocLister? \n			&parents=`18`\n			&tvList=`desktop_img`\n			&tpl=`service_offer_item`\n			!]\n		</div>\n    </div>\n</div>','0','1666163731','1666163731','0'),
  ('25','service_advantages','Our advantages','2','none','10','0','<div class=\"benefits\">\n    <div class=\"benefits__container container container__alt\">\n        <div class=\"benefits__title\">Наши преимущества</div>\n\n        <div class=\"benefits__list\">\n                            <div class=\"benefits__item\">\n                    <div class=\"benefits__item-in\">\n                        <img src=\"/dist/img/service/benefits/icon-1.png\" alt=\"\">\n                        <div class=\"benefits__name\">Более 20 лет <br>опыт работы с Kia</div>\n                    </div>\n                </div>\n                            <div class=\"benefits__item\">\n                    <div class=\"benefits__item-in\">\n                        <img src=\"/dist/img/service/benefits/icon-2.png\" alt=\"\">\n                        <div class=\"benefits__name\">Подменный автомобиль <br>на время ремонта</div>\n                    </div>\n                </div>\n                            <div class=\"benefits__item\">\n                    <div class=\"benefits__item-in\">\n                        <img src=\"/dist/img/service/benefits/icon-3.png\" alt=\"\">\n                        <div class=\"benefits__name\">Выгодные <br>спецпредложения</div>\n                    </div>\n                </div>\n                            <div class=\"benefits__item\">\n                    <div class=\"benefits__item-in\">\n                        <img src=\"/dist/img/service/benefits/icon-4.png\" alt=\"\">\n                        <div class=\"benefits__name\">Все специалисты <br>сертифицированы Kia</div>\n                    </div>\n                </div>\n                            <div class=\"benefits__item\">\n                    <div class=\"benefits__item-in\">\n                        <img src=\"/dist/img/service/benefits/icon-5.png\" alt=\"\">\n                        <div class=\"benefits__name\">Гарантия на работы</div>\n                    </div>\n                </div>\n                    </div>\n    </div>\n</div>','0','1666164097','1666164097','0'),
  ('26','get_consultation','get a consultation block','2','none','5','0','<div class=\"consultation\">\n    <div class=\"consultation__container\">\n        <picture>\n            <source srcset=\"/dist/img/service/consultation-bg.webp\" type=\"image/webp\">\n            <img class=\"consultation__img\" src=\"/dist/img/service/consultation-bg.jpg\" alt=\"Консультация\" loading=\"lazy\">\n        </picture>\n        <div class=\"consultation__body\">\n            <div class=\"consultation__title\">Получить консультацию</div>\n            <form class=\"form consultation__form js-form js-ajax-form\" data-id=\"form-application\" data-callkeeper_name=\"Получить консультацию\">\n                \n				<input type=\"hidden\" name=\"formid\" value=\"basic\">\n                <input type=\"hidden\" name=\"type\" value=\"form\">\n                <input type=\"hidden\" name=\"phone_manager\" value=\"+74957170707\">\n                <input type=\"hidden\" name=\"form_key\" value=\"callback\">\n                <input type=\"hidden\" name=\"form_name\" value=\"Заказать звонок\">\n                <fieldset>\n                    <div class=\"first-screen__row required\">\n                        <div class=\"first-screen__field\">\n                            <label for=\"phone\" class=\"form__label required\">\n                                <input type=\"tel\" class=\"first-screen__input form-control js-form-input\" name=\"phone\" placeholder=\"Введите телефон\" data-callkeeper=\"tel\" inputmode=\"text\">\n                            </label>\n                        </div>\n                    </div>\n                    <div class=\"consultation__row\">\n                        <div class=\"consultation__field\">\n                            <button type=\"submit\" class=\"consultation__button\">Получить консультацию</button>\n                        </div>\n                    </div>\n                    <label for=\"policy_consultation\" class=\"form__check\">\n                        <input type=\"checkbox\" hidden=\"\" id=\"policy_consultation\" name=\"policy_consultation\" class=\"js-policy\" checked=\"checked\">\n                        <span class=\"form__check-box\">\n                            <img src=\"./dist/img/svg/checkmark.svg\" alt=\"\">\n                        </span>\n                        <p class=\"intro__form__policy\">\n                            Нажимая кнопку «Заказать», я даю согласие на обработку своих\n                            <a href=\"/\" target=\"_blank\">персональных данных</a>\n                        </p>\n                    </label>\n                </fieldset>\n            </form>\n        </div>\n    </div>\n</div>','0','1666164203','1666287737','0'),
  ('30','formReport','','2','none','13','0','<h2 style=\"padding-left: 30px; font-family: Arial, sans-serif;\">На сайте оставлена заявка</h2>\n\n<table style=\"margin-left: 30px; width: 600px; font-size: 14px; line-height: 22px;\" rules=\"none\">\n	<tr valign=\"top\">\n		<td style=\"padding: 4px 14px 4px 8px; min-width: 120px; border-bottom: #ededed solid 1px; width: 200px; font: 14px/24px Arial, sans-serif;\">\n			Название формы:\n		</td>\n		<td style=\"padding: 4px 14px 4px 8px; min-width: 120px; border-bottom: #ededed solid 1px; width: 200px; font: 14px/24px Arial, sans-serif;\">\n			[+form_name+]\n		</td>\n	</tr>\n	[[if? &is=`[+name+]:!empty` &then=`\n	<tr valign=\"top\">\n		<td style=\"padding: 4px 14px 4px 8px; min-width: 120px; border-bottom: #ededed solid 1px; width: 200px; font: 14px/24px Arial, sans-serif;\">\n			Имя:\n		</td>\n		<td style=\"padding: 4px 14px 4px 8px; min-width: 120px; border-bottom: #ededed solid 1px; width: 200px; font: 14px/24px Arial, sans-serif;\">\n			[+name+]\n		</td>\n	</tr>\n	`]]\n	<tr valign=\"top\">\n		<td style=\"padding: 4px 14px 4px 8px; min-width: 120px; border-bottom: #ededed solid 1px; width: 200px; font: 14px/24px Arial, sans-serif;\">\n			Телефон:\n		</td>\n		<td style=\"padding: 4px 14px 4px 8px; min-width: 120px; border-bottom: #ededed solid 1px; width: 200px; font: 14px/24px Arial, sans-serif;\">\n			[+phone+]\n		</td>\n	</tr>\n	[[if? &is=`[+email+]:!empty` &then=`\n	<tr valign=\"top\">\n		<td style=\"padding: 4px 14px 4px 8px; min-width: 120px; border-bottom: #ededed solid 1px; width: 200px; font: 14px/24px Arial, sans-serif;\">\n			Email:\n		</td>\n		<td style=\"padding: 4px 14px 4px 8px; min-width: 120px; border-bottom: #ededed solid 1px; width: 200px; font: 14px/24px Arial, sans-serif;\">\n			[+email+]\n		</td>\n	</tr>\n	`]]\n</table>\n<br>','0','1666267438','1666271600','0'),
  ('28','service_nav_links','navigation links','2','none','0','0','<nav class=\"nav js-nav\">\n    <div class=\"nav__dealer\">\n        <p class=\"nav__dealer-title\">Kia АВТОРУСЬ Бутово</p>\n        <p class=\"nav__dealer-text\">Официальный дилер Kia</p>\n    </div>\n    <ul class=\"nav__list container\">\n        <li class=\"nav__list-item\">\n            <a href=\"/#stock\" data-height=\"150\">Авто в наличии</a>\n        </li>\n        <li class=\"nav__list-item\">\n            <a href=\"/#models-nav\" data-height=\"150\">Модели</a>\n        </li>\n        <li class=\"nav__list-item\">\n            <a href=\"/#trade-in\" data-height=\"-50\">Трейд-Ин</a>\n        </li>\n        <li class=\"nav__list-item\">\n            <a href=\"javascript: void(0);\" class=\"js-popup-link\" data-mfp-src=\"#modal-call\" data-height=\"150\">Автомобили с пробегом</a>\n        </li>\n        <li class=\"nav__list-item\">\n            <a href=\"/#contacts\" data-height=\"150\">Контакты</a>\n        </li>\n    </ul>\n\n    <p class=\"nav__address\">г. Москва, Южное Бутово, Чечерский проезд, 1\n    </p>\n</nav>','0','0','1666184187','0'),
  ('29','callback_form','','2','none','12','0','<div class=\"modal\" id=\"modal-call\">\n	<div class=\"modal__wrap\">\n		<h4 class=\"modal__title\">Оставить заявку</h4>\n		<p class=\"modal__text\">Укажите ваш номер телефона, и наш менеджер свяжется с вами</p>\n		<form class=\"form modal__form js-form js-ajax-form\" data-id=\"form-application2\">\n			<input type=\"hidden\" name=\"formid\" value=\"basic\">\n			<input type=\"hidden\" name=\"type\" value=\"form\">\n			<input type=\"hidden\" name=\"phone_manager\" value=\"\">\n			<input type=\"hidden\" name=\"form_key\" value=\"callback\">\n			<input type=\"hidden\" name=\"form_name\" value=\"Оставить заявку\">\n			<fieldset>\n				<label for=\"phone\" class=\"form__label required\">\n					<input type=\"tel\" name=\"phone\" class=\"modal__form-input js-form-input\" placeholder=\"Телефон\" inputmode=\"text\">\n				</label>\n				<button class=\"btn btn_dark form__btn js-form-submit\" type=\"submit\">\n					<span>Оставить заявку</span>\n					<div class=\"lds-dual-ring btn__spin\"></div>\n				</button>\n				<label for=\"policy\" class=\"form__check\">\n					<input type=\"checkbox\" hidden=\"\" id=\"policy\" name=\"policy\" class=\"js-policy\" checked=\"checked\">\n					<span class=\"form__check-box\">\n						<img src=\"/dist/img/svg/checkmark.svg\" alt=\"\">\n					</span>\n					<p class=\"modal__policy\">\n						Нажимая кнопку «Заказать», я даю согласие на обработку своих персональных данных\n						<a href=\"/\" target=\"_blank\">персональных данных</a>\n					</p>\n				</label>\n			</fieldset>\n		</form>\n	</div>\n</div>','0','1666198618','1666280715','0'),
  ('31','service_special_offer_form','','2','none','12','0','<div class=\"modal modal-special\" id=\"modal-special-call\">\n	<div class=\"modal__wrapper\">\n		<div class=\"modal__left\">\n			<div class=\"modal__left_content\">\n				\n			</div>\n		</div>\n		<div class=\"modal__right\">\n			<h4 class=\"modal__title\">Оставить заявку!</h4>\n			<p class=\"modal__text\">Укажите ваш номер телефона, и наш менеджер свяжется с вами</p>\n			<form class=\"form modal__form js-form js-ajax-form\" data-id=\"form-application2\">\n				<input type=\"hidden\" name=\"formid\" value=\"basic\">\n				<input type=\"hidden\" name=\"form_name\" value=\"Оставить заявку на сервис\">\n				<fieldset>\n					<label for=\"phone\" class=\"form__label required\">\n						<input type=\"tel\" name=\"phone\" id=\"phone\" class=\"modal__form-input js-form-input\" placeholder=\"Телефон\" inputmode=\"text\">\n					</label>\n					<button class=\"btn btn_dark form__btn js-form-submit\" type=\"submit\">\n						<span>Оставить заявку</span>\n					</button>\n					<label for=\"policy\" class=\"form__check\">\n						<input type=\"checkbox\" hidden=\"\" id=\"policy\" name=\"policy\" class=\"js-policy\" checked=\"checked\">\n						<span class=\"form__check-box\">\n							<img src=\"./dist/img/svg/checkmark.svg\" alt=\"\">\n						</span>\n						<span class=\"modal__policy\">\n							Нажимая кнопку «Заказать», я даю согласие на обработку своих персональных данных\n							<a href=\"/\" target=\"_blank\">персональных данных</a>\n						</span>\n					</label>\n				</fieldset>\n			</form>\n		</div>\n	</div>\n</div>','0','0','1666271695','0'),
  ('32','thanks_form','','2','none','12','0','<div class=\"modal modal_success\" id=\"modal-success\">\n	<div class=\"modal__wrap\">\n		<h4 class=\"modal__title\">Спасибо за заявку!</h4>\n		<p class=\"modal__text\">Наш менеджер свяжется с Вами в течение 3 минут</p>\n		<button class=\"form__btn btn btn_dark js-popup-close\">\n			<span>Хорошо</span>\n		</button>\n	</div>\n</div>','0','0','1666271157','0');

#
# Dumping data for table `dy5r_site_module_access`
#

#
# Dumping data for table `dy5r_site_module_depobj`
#

#
# Dumping data for table `dy5r_site_modules`
#

INSERT INTO `dy5r_site_modules` VALUES
  ('1','Doc Manager','<strong>1.1.1</strong> Quickly perform bulk updates to the Documents in your site including templates, publishing details, and permissions','0','0','4','0','0','','0','','0','0','docman435243542tf542t5t','1','[]',' \n/**\n * Doc Manager\n * \n * Quickly perform bulk updates to the Documents in your site including templates, publishing details, and permissions\n * \n * @category	module\n * @version 	1.1.1\n * @license 	http://www.gnu.org/copyleft/gpl.html GNU Public License (GPL)\n * @internal	@properties\n * @internal	@guid docman435243542tf542t5t	\n * @internal	@shareparams 1\n * @internal	@dependencies requires files located at /assets/modules/docmanager/\n * @internal	@modx_category Manager and Admin\n * @internal    @installset base, sample\n * @lastupdate  09/04/2016\n */\n\ninclude_once(MODX_BASE_PATH.\'assets/modules/docmanager/classes/docmanager.class.php\');\ninclude_once(MODX_BASE_PATH.\'assets/modules/docmanager/classes/dm_frontend.class.php\');\ninclude_once(MODX_BASE_PATH.\'assets/modules/docmanager/classes/dm_backend.class.php\');\n\n$dm = new DocManager($modx);\n$dmf = new DocManagerFrontend($dm, $modx);\n$dmb = new DocManagerBackend($dm, $modx);\n\n$dm->ph = $dm->getLang();\n$dm->ph[\'theme\'] = $dm->getTheme();\n$dm->ph[\'ajax.endpoint\'] = MODX_SITE_URL.\'assets/modules/docmanager/tv.ajax.php\';\n$dm->ph[\'datepicker.offset\'] = $modx->config[\'datepicker_offset\'];\n$dm->ph[\'datetime.format\'] = $modx->config[\'datetime_format\'];\n\nif (isset($_POST[\'tabAction\'])) {\n    $dmb->handlePostback();\n} else {\n    $dmf->getViews();\n    echo $dm->parseTemplate(\'main.tpl\', $dm->ph);\n}'),
  ('2','Extras','<strong>0.1.4</strong> first repository for Evolution CMS','0','0','4','0','0','','0','','0','0','store435243542tf542t5t','1','[]',' \n/**\n * Extras\n * \n * first repository for Evolution CMS\n * \n * @category	module\n * @version 	0.1.4\n * @internal	@properties\n * @internal	@guid store435243542tf542t5t	\n * @internal	@shareparams 1\n * @internal	@dependencies requires files located at /assets/modules/store/\n * @internal	@modx_category Manager and Admin\n * @internal    @installset base, sample\n * @lastupdate  25/11/2016\n */\n\n//AUTHORS: Bumkaka & Dmi3yy \ninclude_once(\'../assets/modules/store/core.php\');');

#
# Dumping data for table `dy5r_site_plugin_events`
#

INSERT INTO `dy5r_site_plugin_events` VALUES
  ('1','24','0'),
  ('1','30','0'),
  ('1','77','0'),
  ('1','39','0'),
  ('1','95','0'),
  ('1','45','0'),
  ('1','51','0'),
  ('2','28','0'),
  ('2','26','0'),
  ('2','121','0'),
  ('2','125','0'),
  ('2','126','0'),
  ('2','79','0'),
  ('2','81','0'),
  ('2','43','0'),
  ('2','41','0'),
  ('2','49','0'),
  ('2','47','0'),
  ('2','55','0'),
  ('2','53','0'),
  ('2','61','0'),
  ('2','59','0'),
  ('3','40','0'),
  ('3','46','0'),
  ('3','38','0'),
  ('3','39','1'),
  ('3','44','0'),
  ('3','45','1'),
  ('4','84','0'),
  ('4','85','0'),
  ('4','105','0');

INSERT INTO `dy5r_site_plugin_events` VALUES
  ('5','31','0'),
  ('5','120','0'),
  ('5','29','0'),
  ('5','30','1'),
  ('5','32','0'),
  ('5','39','2'),
  ('5','57','0'),
  ('6','117','0'),
  ('7','29','1'),
  ('7','32','1'),
  ('7','13','0'),
  ('7','102','0'),
  ('7','3','0'),
  ('8','90','0'),
  ('8','101','0'),
  ('8','21','0'),
  ('8','102','1'),
  ('8','95','1'),
  ('8','94','0'),
  ('8','3','1'),
  ('9','112','0'),
  ('10','117','1'),
  ('10','134','0'),
  ('10','74','0'),
  ('11','134','1'),
  ('11','83','0'),
  ('11','4','0'),
  ('11','97','0'),
  ('12','134','1'),
  ('12','83','0'),
  ('12','4','0');

INSERT INTO `dy5r_site_plugin_events` VALUES
  ('12','97','0'),
  ('12','7','0');

#
# Dumping data for table `dy5r_site_plugins`
#

INSERT INTO `dy5r_site_plugins` VALUES
  ('1','CodeMirror','<strong>1.5.1</strong> JavaScript library that can be used to create a relatively pleasant editor interface based on CodeMirror 5.33 (released on 21-12-2017)','0','4','0','\n/**\n * CodeMirror\n *\n * JavaScript library that can be used to create a relatively pleasant editor interface based on CodeMirror 5.33 (released on 21-12-2017)\n *\n * @category    plugin\n * @version     1.5.1\n * @license     http://www.gnu.org/copyleft/gpl.html GNU Public License (GPL)\n * @package     evo\n * @internal    @events OnDocFormRender,OnChunkFormRender,OnModFormRender,OnPluginFormRender,OnSnipFormRender,OnTempFormRender,OnRichTextEditorInit\n * @internal    @modx_category Manager and Admin\n * @internal    @properties &theme=Theme;list;default,ambiance,blackboard,cobalt,eclipse,elegant,erlang-dark,lesser-dark,midnight,monokai,neat,night,one-dark,rubyblue,solarized,twilight,vibrant-ink,xq-dark,xq-light;default &darktheme=Dark Theme;list;default,ambiance,blackboard,cobalt,eclipse,elegant,erlang-dark,lesser-dark,midnight,monokai,neat,night,one-dark,rubyblue,solarized,twilight,vibrant-ink,xq-dark,xq-light;one-dark &fontSize=Font-size;list;10,11,12,13,14,15,16,17,18;14 &lineHeight=Line-height;list;1,1.1,1.2,1.3,1.4,1.5;1.3 &indentUnit=Indent unit;int;4 &tabSize=The width of a tab character;int;4 &lineWrapping=lineWrapping;list;true,false;true &matchBrackets=matchBrackets;list;true,false;true &activeLine=activeLine;list;true,false;false &emmet=emmet;list;true,false;true &search=search;list;true,false;false &indentWithTabs=indentWithTabs;list;true,false;true &undoDepth=undoDepth;int;200 &historyEventDelay=historyEventDelay;int;1250\n * @internal    @installset base\n * @reportissues https://github.com/evolution-cms/evolution/issues/\n * @documentation Official docs https://codemirror.net/doc/manual.html\n * @author      hansek from http://www.modxcms.cz\n * @author      update Mihanik71\n * @author      update Deesen\n * @author      update 64j\n * @lastupdate  08-01-2018\n */\n\n$_CM_BASE = \'assets/plugins/codemirror/\';\n\n$_CM_URL = $modx->config[\'site_url\'] . $_CM_BASE;\n\nrequire(MODX_BASE_PATH. $_CM_BASE .\'codemirror.plugin.php\');','0','{\"theme\":[{\"label\":\"Theme\",\"type\":\"list\",\"value\":\"default\",\"options\":\"default,ambiance,blackboard,cobalt,eclipse,elegant,erlang-dark,lesser-dark,midnight,monokai,neat,night,one-dark,rubyblue,solarized,twilight,vibrant-ink,xq-dark,xq-light\",\"default\":\"default\",\"desc\":\"\"}],\"darktheme\":[{\"label\":\"Dark Theme\",\"type\":\"list\",\"value\":\"one-dark\",\"options\":\"default,ambiance,blackboard,cobalt,eclipse,elegant,erlang-dark,lesser-dark,midnight,monokai,neat,night,one-dark,rubyblue,solarized,twilight,vibrant-ink,xq-dark,xq-light\",\"default\":\"one-dark\",\"desc\":\"\"}],\"fontSize\":[{\"label\":\"Font-size\",\"type\":\"list\",\"value\":\"14\",\"options\":\"10,11,12,13,14,15,16,17,18\",\"default\":\"14\",\"desc\":\"\"}],\"lineHeight\":[{\"label\":\"Line-height\",\"type\":\"list\",\"value\":\"1.3\",\"options\":\"1,1.1,1.2,1.3,1.4,1.5\",\"default\":\"1.3\",\"desc\":\"\"}],\"indentUnit\":[{\"label\":\"Indent unit\",\"type\":\"int\",\"value\":\"4\",\"default\":\"4\",\"desc\":\"\"}],\"tabSize\":[{\"label\":\"The width of a tab character\",\"type\":\"int\",\"value\":\"4\",\"default\":\"4\",\"desc\":\"\"}],\"lineWrapping\":[{\"label\":\"lineWrapping\",\"type\":\"list\",\"value\":\"true\",\"options\":\"true,false\",\"default\":\"true\",\"desc\":\"\"}],\"matchBrackets\":[{\"label\":\"matchBrackets\",\"type\":\"list\",\"value\":\"true\",\"options\":\"true,false\",\"default\":\"true\",\"desc\":\"\"}],\"activeLine\":[{\"label\":\"activeLine\",\"type\":\"list\",\"value\":\"false\",\"options\":\"true,false\",\"default\":\"false\",\"desc\":\"\"}],\"emmet\":[{\"label\":\"emmet\",\"type\":\"list\",\"value\":\"true\",\"options\":\"true,false\",\"default\":\"true\",\"desc\":\"\"}],\"search\":[{\"label\":\"search\",\"type\":\"list\",\"value\":\"false\",\"options\":\"true,false\",\"default\":\"false\",\"desc\":\"\"}],\"indentWithTabs\":[{\"label\":\"indentWithTabs\",\"type\":\"list\",\"value\":\"true\",\"options\":\"true,false\",\"default\":\"true\",\"desc\":\"\"}],\"undoDepth\":[{\"label\":\"undoDepth\",\"type\":\"int\",\"value\":\"200\",\"default\":\"200\",\"desc\":\"\"}],\"historyEventDelay\":[{\"label\":\"historyEventDelay\",\"type\":\"int\",\"value\":\"1250\",\"default\":\"1250\",\"desc\":\"\"}]}','0','','0','0'),
  ('2','ElementsInTree','<strong>1.5.11</strong> Get access to all Elements and Modules inside Manager sidebar','0','4','0','require MODX_BASE_PATH.\'assets/plugins/elementsintree/plugin.elementsintree.php\';\n','0','{\"adminRoleOnly\":[{\"label\":\"Administrators only\",\"type\":\"list\",\"value\":\"yes\",\"options\":\"yes,no\",\"default\":\"yes\",\"desc\":\"\"}],\"treeButtonsInTab\":[{\"label\":\"Tree buttons in tab\",\"type\":\"list\",\"value\":\"yes\",\"options\":\"yes,no\",\"default\":\"yes\",\"desc\":\"\"}]}','1','','0','0'),
  ('3','FileSource','<strong>0.1.1</strong> Save snippet and plugins to file','0','4','0','require MODX_BASE_PATH.\'assets/plugins/filesource/plugin.filesource.php\';','0','[]','0','','0','0'),
  ('4','Forgot Manager Login','<strong>1.1.7</strong> Resets your manager login when you forget your password via email confirmation','0','4','0','require MODX_BASE_PATH.\'assets/plugins/forgotmanagerlogin/plugin.forgotmanagerlogin.php\';','0','[]','0','','0','0'),
  ('5','ManagerManager','<strong>0.6.4</strong> Customize the EVO Manager to offer bespoke admin functions for end users or manipulate the display of document fields in the manager.','0','4','0','\n/**\n * ManagerManager\n *\n * Customize the EVO Manager to offer bespoke admin functions for end users or manipulate the display of document fields in the manager.\n *\n * @category plugin\n * @version 0.6.4\n * @license http://creativecommons.org/licenses/GPL/2.0/ GNU Public License (GPL v2)\n * @internal @properties &remove_deprecated_tv_types_pref=Remove deprecated TV types;list;yes,no;yes &config_chunk=Configuration Chunk;text;mm_rules\n * @internal @events OnDocFormRender,OnDocFormPrerender,OnBeforeDocFormSave,OnDocFormSave,OnDocDuplicate,OnPluginFormRender,OnTVFormRender\n * @internal @modx_category Manager and Admin\n * @internal @installset base\n * @internal @legacy_names Image TV Preview, Show Image TVs\n * @reportissues https://github.com/DivanDesign/MODXEvo.plugin.ManagerManager/\n * @documentation README [+site_url+]assets/plugins/managermanager/readme.html\n * @documentation Official docs http://code.divandesign.biz/modx/managermanager\n * @link        Latest version http://code.divandesign.biz/modx/managermanager\n * @link        Additional tools http://code.divandesign.biz/modx\n * @link        Full changelog http://code.divandesign.biz/modx/managermanager/changelog\n * @author      Inspired by: HideEditor plugin by Timon Reinhard and Gildas; HideManagerFields by Brett @ The Man Can!\n * @author      DivanDesign studio http://www.DivanDesign.biz\n * @author      Nick Crossland http://www.rckt.co.uk\n * @author      Many others\n * @lastupdate  22/01/2018\n */\n\n// Run the main code\ninclude($modx->config[\'base_path\'].\'assets/plugins/managermanager/mm.inc.php\');\n','0','{\"remove_deprecated_tv_types_pref\":[{\"label\":\"Remove deprecated TV types\",\"type\":\"list\",\"value\":\"yes\",\"options\":\"yes,no\",\"default\":\"yes\",\"desc\":\"\"}],\"config_chunk\":[{\"label\":\"Configuration Chunk\",\"type\":\"text\",\"value\":\"mm_rules\",\"default\":\"mm_rules\",\"desc\":\"\"}]}','0','','0','0'),
  ('6','OutdatedExtrasCheck','<strong>1.4.7</strong> Check for Outdated critical extras not compatible with EVO 1.4.6','0','4','0','/**\n * OutdatedExtrasCheck\n *\n * Check for Outdated critical extras not compatible with EVO 1.4.6\n *\n * @category	plugin\n * @version     1.4.7\n * @license 	http://www.gnu.org/copyleft/gpl.html GNU Public License (GPL)\n * @package     evo\n * @author      Author: Nicola Lambathakis\n * @internal    @events OnManagerWelcomeHome\n * @internal    @properties &wdgVisibility=Show widget for:;menu;All,AdminOnly,AdminExcluded,ThisRoleOnly,ThisUserOnly;AdminOnly &ThisRole=Run only for this role:;string;;;(role id) &ThisUser=Run only for this user:;string;;;(username)\n * @internal    @modx_category Manager and Admin\n * @internal    @installset base\n * @internal    @disabled 0\n */\n\nrequire MODX_BASE_PATH . \'assets/plugins/extrascheck/OutdatedExtrasCheck.plugin.php\';\n','0','{\"wdgVisibility\":[{\"label\":\"Show widget for:\",\"type\":\"menu\",\"value\":\"AdminOnly\",\"options\":\"All,AdminOnly,AdminExcluded,ThisRoleOnly,ThisUserOnly\",\"default\":\"AdminOnly\",\"desc\":\"\"}],\"ThisRole\":[{\"label\":\"Run only for this role:\",\"type\":\"string\",\"value\":\"\",\"default\":\"\",\"desc\":\"\"}],\"ThisUser\":[{\"label\":\"Run only for this user:\",\"type\":\"string\",\"value\":\"\",\"default\":\"\",\"desc\":\"\"}]}','0','','0','0'),
  ('7','Quick Manager+','<strong>1.5.13</strong> Enables QuickManager+ front end content editing support','0','4','0','\n/**\n * Quick Manager+\n * \n * Enables QuickManager+ front end content editing support\n *\n * @category 	plugin\n * @version 	1.5.13\n * @license 	http://www.gnu.org/copyleft/gpl.html GNU Public License (GPL v3)\n * @internal    @properties &jqpath=Path to jQuery;text;assets/js/jquery.min.js &loadmanagerjq=Load jQuery in manager;list;true,false;false &loadfrontendjq=Load jQuery in front-end;list;true,false;false &noconflictjq=jQuery noConflict mode in front-end;list;true,false;false &loadfa=Load Font Awesome css in front-end;list;true,false;true &loadtb=Load modal box in front-end;list;true,false;true &tbwidth=Modal box window width;text;80% &tbheight=Modal box window height;text;90% &hidefields=Hide document fields from front-end editors;text;parent &hidetabs=Hide document tabs from front-end editors;text; &hidesections=Hide document sections from front-end editors;text; &addbutton=Show add document here button;list;true,false;true &tpltype=New document template type;list;parent,id,selected;parent &tplid=New document template id;int;3 &custombutton=Custom buttons;textarea; &managerbutton=Show go to manager button;list;true,false;true &logout=Logout to;list;manager,front-end;manager &disabled=Plugin disabled on documents;text; &autohide=Autohide toolbar;list;true,false;true &position= Toolbar position;list;top,right,bottom,left,before;top &editbuttons=Inline edit buttons;list;true,false;false &editbclass=Edit button CSS class;text;qm-edit &newbuttons=Inline new resource buttons;list;true,false;false &newbclass=New resource button CSS class;text;qm-new &tvbuttons=Inline template variable buttons;list;true,false;false &tvbclass=Template variable button CSS class;text;qm-tv &removeBg=Remove toolbar background;list;yes,no;no &buttonStyle=QuickManager buttons CSS stylesheet;list;actionButtons,navButtons;navButtons  \n * @internal	@events OnParseDocument,OnWebPagePrerender,OnDocFormPrerender,OnDocFormSave,OnManagerLogout \n * @internal	@modx_category Manager and Admin\n * @internal    @legacy_names QM+,QuickEdit\n * @internal    @installset base, sample\n * @internal    @disabled 1\n * @reportissues https://github.com/modxcms/evolution\n * @documentation Official docs [+site_url+]assets/plugins/qm/readme.html\n * @link        http://www.maagit.fi/modx/quickmanager-plus\n * @author      Mikko Lammi\n * @author      Since 2011: yama, dmi3yy, segr, Nicola1971.\n * @lastupdate  22/06/2022 \n */\n\n// In manager\nif (!$modx->checkSession()) return;\n\n$show = TRUE;\n\nif (!empty($disabled)) {\n    $arr = array_filter(array_map(\'intval\', explode(\',\', $disabled)));\n    if (in_array($modx->documentIdentifier, $arr)) {\n        $show = FALSE;\n    }\n}\n\nif ($show) {\n    // Replace [*#tv*] with QM+ edit TV button placeholders\n    if ($tvbuttons == \'true\') {\n        if ($modx->event->name == \'OnParseDocument\') {\n             $output = &$modx->documentOutput;\n             $output = preg_replace(\'~\\[\\*#(.*?)\\*\\]~\', \'<!-- \'.$tvbclass.\' $1 -->[*$1*]\', $output);\n             $modx->documentOutput = $output;\n         }\n     }\n    include_once($modx->config[\'base_path\'].\'assets/plugins/qm/qm.inc.php\');\n    $qm = new Qm($modx, $jqpath, $loadmanagerjq, $loadfrontendjq, $noconflictjq, $loadfa, $loadtb, $tbwidth, $tbheight, $hidefields, $hidetabs ?? \'\', $hidesections ?? \'\', $addbutton, $tpltype, $tplid, $custombutton ?? \'\', $managerbutton, $logout, $autohide, $position, $editbuttons, $editbclass, $newbuttons, $newbclass, $tvbuttons, $tvbclass, $buttonStyle, $removeBg);\n}\n','0','{\"jqpath\":[{\"label\":\"Path to jQuery\",\"type\":\"text\",\"value\":\"assets\\/js\\/jquery.min.js\",\"default\":\"assets\\/js\\/jquery.min.js\",\"desc\":\"\"}],\"loadmanagerjq\":[{\"label\":\"Load jQuery in manager\",\"type\":\"list\",\"value\":\"false\",\"options\":\"true,false\",\"default\":\"false\",\"desc\":\"\"}],\"loadfrontendjq\":[{\"label\":\"Load jQuery in front-end\",\"type\":\"list\",\"value\":\"false\",\"options\":\"true,false\",\"default\":\"false\",\"desc\":\"\"}],\"noconflictjq\":[{\"label\":\"jQuery noConflict mode in front-end\",\"type\":\"list\",\"value\":\"false\",\"options\":\"true,false\",\"default\":\"false\",\"desc\":\"\"}],\"loadfa\":[{\"label\":\"Load Font Awesome css in front-end\",\"type\":\"list\",\"value\":\"true\",\"options\":\"true,false\",\"default\":\"true\",\"desc\":\"\"}],\"loadtb\":[{\"label\":\"Load modal box in front-end\",\"type\":\"list\",\"value\":\"true\",\"options\":\"true,false\",\"default\":\"true\",\"desc\":\"\"}],\"tbwidth\":[{\"label\":\"Modal box window width\",\"type\":\"text\",\"value\":\"80%\",\"default\":\"80%\",\"desc\":\"\"}],\"tbheight\":[{\"label\":\"Modal box window height\",\"type\":\"text\",\"value\":\"90%\",\"default\":\"90%\",\"desc\":\"\"}],\"hidefields\":[{\"label\":\"Hide document fields from front-end editors\",\"type\":\"text\",\"value\":\"parent\",\"default\":\"parent\",\"desc\":\"\"}],\"hidetabs\":[{\"label\":\"Hide document tabs from front-end editors\",\"type\":\"text\",\"value\":\"\",\"default\":\"\",\"desc\":\"\"}],\"hidesections\":[{\"label\":\"Hide document sections from front-end editors\",\"type\":\"text\",\"value\":\"\",\"default\":\"\",\"desc\":\"\"}],\"addbutton\":[{\"label\":\"Show add document here button\",\"type\":\"list\",\"value\":\"true\",\"options\":\"true,false\",\"default\":\"true\",\"desc\":\"\"}],\"tpltype\":[{\"label\":\"New document template type\",\"type\":\"list\",\"value\":\"parent\",\"options\":\"parent,id,selected\",\"default\":\"parent\",\"desc\":\"\"}],\"tplid\":[{\"label\":\"New document template id\",\"type\":\"int\",\"value\":\"3\",\"default\":\"3\",\"desc\":\"\"}],\"custombutton\":[{\"label\":\"Custom buttons\",\"type\":\"textarea\",\"value\":\"\",\"default\":\"\",\"desc\":\"\"}],\"managerbutton\":[{\"label\":\"Show go to manager button\",\"type\":\"list\",\"value\":\"true\",\"options\":\"true,false\",\"default\":\"true\",\"desc\":\"\"}],\"logout\":[{\"label\":\"Logout to\",\"type\":\"list\",\"value\":\"manager\",\"options\":\"manager,front-end\",\"default\":\"manager\",\"desc\":\"\"}],\"disabled\":[{\"label\":\"Plugin disabled on documents\",\"type\":\"text\",\"value\":\"\",\"default\":\"\",\"desc\":\"\"}],\"autohide\":[{\"label\":\"Autohide toolbar\",\"type\":\"list\",\"value\":\"true\",\"options\":\"true,false\",\"default\":\"true\",\"desc\":\"\"}],\"position\":[{\"label\":\"Toolbar position\",\"type\":\"list\",\"value\":\"top\",\"options\":\"top,right,bottom,left,before\",\"default\":\"top\",\"desc\":\"\"}],\"editbuttons\":[{\"label\":\"Inline edit buttons\",\"type\":\"list\",\"value\":\"false\",\"options\":\"true,false\",\"default\":\"false\",\"desc\":\"\"}],\"editbclass\":[{\"label\":\"Edit button CSS class\",\"type\":\"text\",\"value\":\"qm-edit\",\"default\":\"qm-edit\",\"desc\":\"\"}],\"newbuttons\":[{\"label\":\"Inline new resource buttons\",\"type\":\"list\",\"value\":\"false\",\"options\":\"true,false\",\"default\":\"false\",\"desc\":\"\"}],\"newbclass\":[{\"label\":\"New resource button CSS class\",\"type\":\"text\",\"value\":\"qm-new\",\"default\":\"qm-new\",\"desc\":\"\"}],\"tvbuttons\":[{\"label\":\"Inline template variable buttons\",\"type\":\"list\",\"value\":\"false\",\"options\":\"true,false\",\"default\":\"false\",\"desc\":\"\"}],\"tvbclass\":[{\"label\":\"Template variable button CSS class\",\"type\":\"text\",\"value\":\"qm-tv\",\"default\":\"qm-tv\",\"desc\":\"\"}],\"removeBg\":[{\"label\":\"Remove toolbar background\",\"type\":\"list\",\"value\":\"no\",\"options\":\"yes,no\",\"default\":\"no\",\"desc\":\"\"}],\"buttonStyle\":[{\"label\":\"QuickManager buttons CSS stylesheet\",\"type\":\"list\",\"value\":\"navButtons\",\"options\":\"actionButtons,navButtons\",\"default\":\"navButtons\",\"desc\":\"\"}]}','1','','0','0'),
  ('8','TinyMCE4','<strong>4.9.12</strong> Javascript rich text editor','0','4','0','\n/**\n * TinyMCE4\n *\n * Javascript rich text editor\n *\n * @category    plugin\n * @version     4.9.12\n * @license     http://www.gnu.org/copyleft/gpl.html GNU Public License (GPL)\n * @internal    @properties &styleFormats=Custom Style Formats <b>RAW</b><br/><br/><ul><li>leave empty to use below block/inline formats</li><li>allows simple-format: <i>Title,cssClass|Title2,cssClass2</i></li><li>Also accepts full JSON-config as per TinyMCE4 docs / configure / content-formating / style_formats</li></ul>;textarea; &styleFormats_inline=Custom Style Formats <b>INLINE</b><br/><br/><ul><li>will wrap selected text with span-tag + css-class</li><li>simple-format only</li></ul>;textarea;InlineTitle,cssClass1|InlineTitle2,cssClass2 &styleFormats_block=Custom Style Formats <b>BLOCK</b><br/><br/><ul><li>will add css-class to selected block-element</li><li>simple-format only</li></ul>;textarea;BlockTitle,cssClass3|BlockTitle2,cssClass4 &customParams=Custom Parameters<br/><b>(Be careful or leave empty!)</b>;textarea; &entityEncoding=Entity Encoding;list;named,numeric,raw;named &entities=Entities;text; &pathOptions=Path Options;list;Site config,Absolute path,Root relative,URL,No convert;Site config &resizing=Advanced Resizing;list;true,false;false &disabledButtons=Disabled Buttons;text; &webTheme=Web Theme;test;webuser &webPlugins=Web Plugins;text; &webButtons1=Web Buttons 1;text;bold italic underline strikethrough removeformat alignleft aligncenter alignright &webButtons2=Web Buttons 2;text;link unlink image undo redo &webButtons3=Web Buttons 3;text; &webButtons4=Web Buttons 4;text; &webAlign=Web Toolbar Alignment;list;ltr,rtl;ltr &width=Width;text;100% &height=Height;text;400px &introtextRte=<b>Introtext RTE</b><br/>add richtext-features to \"introtext\";list;enabled,disabled;disabled &inlineMode=<b>Inline-Mode</b>;list;enabled,disabled;disabled &inlineTheme=<b>Inline-Mode</b><br/>Theme;text;inline &browser_spellcheck=<b>Browser Spellcheck</b><br/>At least one dictionary must be installed inside your browser;list;enabled,disabled;disabled &paste_as_text=<b>Force Paste as Text</b>;list;enabled,disabled;disabled\n * @internal    @events OnLoadWebDocument,OnParseDocument,OnWebPagePrerender,OnLoadWebPageCache,OnRichTextEditorRegister,OnRichTextEditorInit,OnInterfaceSettingsRender\n * @internal    @modx_category Manager and Admin\n * @internal    @legacy_names TinyMCE Rich Text Editor\n * @internal    @installset base\n * @logo        /assets/plugins/tinymce4/tinymce/logo.png\n * @reportissues https://github.com/extras-evolution/tinymce4-for-modx-evo\n * @documentation Plugin docs https://github.com/extras-evolution/tinymce4-for-modx-evo\n * @documentation Official TinyMCE4-docs https://www.tinymce.com/docs/\n * @author      Deesen\n * @lastupdate  2018-01-17\n */\nif (!defined(\'MODX_BASE_PATH\')) { die(\'What are you doing? Get out of here!\'); }\n\nrequire(MODX_BASE_PATH.\"assets/plugins/tinymce4/plugin.tinymce.inc.php\");\n','0','{\"styleFormats\":[{\"label\":\"Custom Style Formats <b>RAW<\\/b><br\\/><br\\/><ul><li>leave empty to use below block\\/inline formats<\\/li><li>allows simple-format: <i>Title,cssClass|Title2,cssClass2<\\/i><\\/li><li>Also accepts full JSON-config as per TinyMCE4 docs \\/ configure \\/ content-formating \\/ style_formats<\\/li><\\/ul>\",\"type\":\"textarea\",\"value\":\"\",\"default\":\"\",\"desc\":\"\"}],\"styleFormats_inline\":[{\"label\":\"Custom Style Formats <b>INLINE<\\/b><br\\/><br\\/><ul><li>will wrap selected text with span-tag + css-class<\\/li><li>simple-format only<\\/li><\\/ul>\",\"type\":\"textarea\",\"value\":\"InlineTitle,cssClass1|InlineTitle2,cssClass2\",\"default\":\"InlineTitle,cssClass1|InlineTitle2,cssClass2\",\"desc\":\"\"}],\"styleFormats_block\":[{\"label\":\"Custom Style Formats <b>BLOCK<\\/b><br\\/><br\\/><ul><li>will add css-class to selected block-element<\\/li><li>simple-format only<\\/li><\\/ul>\",\"type\":\"textarea\",\"value\":\"BlockTitle,cssClass3|BlockTitle2,cssClass4\",\"default\":\"BlockTitle,cssClass3|BlockTitle2,cssClass4\",\"desc\":\"\"}],\"customParams\":[{\"label\":\"Custom Parameters<br\\/><b>(Be careful or leave empty!)<\\/b>\",\"type\":\"textarea\",\"value\":\"\",\"default\":\"\",\"desc\":\"\"}],\"entityEncoding\":[{\"label\":\"Entity Encoding\",\"type\":\"list\",\"value\":\"named\",\"options\":\"named,numeric,raw\",\"default\":\"named\",\"desc\":\"\"}],\"entities\":[{\"label\":\"Entities\",\"type\":\"text\",\"value\":\"\",\"default\":\"\",\"desc\":\"\"}],\"pathOptions\":[{\"label\":\"Path Options\",\"type\":\"list\",\"value\":\"Site config\",\"options\":\"Site config,Absolute path,Root relative,URL,No convert\",\"default\":\"Site config\",\"desc\":\"\"}],\"resizing\":[{\"label\":\"Advanced Resizing\",\"type\":\"list\",\"value\":\"false\",\"options\":\"true,false\",\"default\":\"false\",\"desc\":\"\"}],\"disabledButtons\":[{\"label\":\"Disabled Buttons\",\"type\":\"text\",\"value\":\"\",\"default\":\"\",\"desc\":\"\"}],\"webTheme\":[{\"label\":\"Web Theme\",\"type\":\"test\",\"value\":\"webuser\",\"default\":\"webuser\",\"desc\":\"\"}],\"webPlugins\":[{\"label\":\"Web Plugins\",\"type\":\"text\",\"value\":\"\",\"default\":\"\",\"desc\":\"\"}],\"webButtons1\":[{\"label\":\"Web Buttons 1\",\"type\":\"text\",\"value\":\"bold italic underline strikethrough removeformat alignleft aligncenter alignright\",\"default\":\"bold italic underline strikethrough removeformat alignleft aligncenter alignright\",\"desc\":\"\"}],\"webButtons2\":[{\"label\":\"Web Buttons 2\",\"type\":\"text\",\"value\":\"link unlink image undo redo\",\"default\":\"link unlink image undo redo\",\"desc\":\"\"}],\"webButtons3\":[{\"label\":\"Web Buttons 3\",\"type\":\"text\",\"value\":\"\",\"default\":\"\",\"desc\":\"\"}],\"webButtons4\":[{\"label\":\"Web Buttons 4\",\"type\":\"text\",\"value\":\"\",\"default\":\"\",\"desc\":\"\"}],\"webAlign\":[{\"label\":\"Web Toolbar Alignment\",\"type\":\"list\",\"value\":\"ltr\",\"options\":\"ltr,rtl\",\"default\":\"ltr\",\"desc\":\"\"}],\"width\":[{\"label\":\"Width\",\"type\":\"text\",\"value\":\"100%\",\"default\":\"100%\",\"desc\":\"\"}],\"height\":[{\"label\":\"Height\",\"type\":\"text\",\"value\":\"400px\",\"default\":\"400px\",\"desc\":\"\"}],\"introtextRte\":[{\"label\":\"<b>Introtext RTE<\\/b><br\\/>add richtext-features to \\\"introtext\\\"\",\"type\":\"list\",\"value\":\"disabled\",\"options\":\"enabled,disabled\",\"default\":\"disabled\",\"desc\":\"\"}],\"inlineMode\":[{\"label\":\"<b>Inline-Mode<\\/b>\",\"type\":\"list\",\"value\":\"disabled\",\"options\":\"enabled,disabled\",\"default\":\"disabled\",\"desc\":\"\"}],\"inlineTheme\":[{\"label\":\"<b>Inline-Mode<\\/b><br\\/>Theme\",\"type\":\"text\",\"value\":\"inline\",\"default\":\"inline\",\"desc\":\"\"}],\"browser_spellcheck\":[{\"label\":\"<b>Browser Spellcheck<\\/b><br\\/>At least one dictionary must be installed inside your browser\",\"type\":\"list\",\"value\":\"disabled\",\"options\":\"enabled,disabled\",\"default\":\"disabled\",\"desc\":\"\"}],\"paste_as_text\":[{\"label\":\"<b>Force Paste as Text<\\/b>\",\"type\":\"list\",\"value\":\"disabled\",\"options\":\"enabled,disabled\",\"default\":\"disabled\",\"desc\":\"\"}]}','0','','0','0'),
  ('9','TransAlias','<strong>1.0.4</strong> Human readible URL translation supporting multiple languages and overrides','0','4','0','require MODX_BASE_PATH.\'assets/plugins/transalias/plugin.transalias.php\';','0','{\"table_name\":[{\"label\":\"Trans table\",\"type\":\"list\",\"value\":\"russian\",\"options\":\"common,russian,dutch,german,czech,utf8,utf8lowercase\",\"default\":\"russian\",\"desc\":\"\"}],\"char_restrict\":[{\"label\":\"Restrict alias to\",\"type\":\"list\",\"value\":\"lowercase alphanumeric\",\"options\":\"lowercase alphanumeric,alphanumeric,legal characters\",\"default\":\"lowercase alphanumeric\",\"desc\":\"\"}],\"remove_periods\":[{\"label\":\"Remove Periods\",\"type\":\"list\",\"value\":\"No\",\"options\":\"Yes,No\",\"default\":\"No\",\"desc\":\"\"}],\"word_separator\":[{\"label\":\"Word Separator\",\"type\":\"list\",\"value\":\"dash\",\"options\":\"dash,underscore,none\",\"default\":\"dash\",\"desc\":\"\"}],\"override_tv\":[{\"label\":\"Override TV name\",\"type\":\"string\",\"value\":\"\",\"default\":\"\",\"desc\":\"\"}]}','0','','0','0'),
  ('10','Updater','<strong>0.8.7</strong> show message about outdated CMS version','0','4','0','require MODX_BASE_PATH.\'assets/plugins/updater/plugin.updater.php\';','0','{\"version\":[{\"label\":\"Version:\",\"type\":\"text\",\"value\":\"evocms-community\\/evolution\",\"default\":\"evocms-community\\/evolution\",\"desc\":\"\"}],\"wdgVisibility\":[{\"label\":\"Show widget for:\",\"type\":\"menu\",\"value\":\"All\",\"options\":\"All,AdminOnly,AdminExcluded,ThisRoleOnly,ThisUserOnly\",\"default\":\"All\",\"desc\":\"\"}],\"ThisRole\":[{\"label\":\"Show only to this role id:\",\"type\":\"string\",\"value\":\"\",\"default\":\"\",\"desc\":\"\"}],\"ThisUser\":[{\"label\":\"Show only to this username:\",\"type\":\"string\",\"value\":\"\",\"default\":\"\",\"desc\":\"\"}],\"showButton\":[{\"label\":\"Show Update Button:\",\"type\":\"menu\",\"value\":\"AdminOnly\",\"options\":\"show,hide,AdminOnly\",\"default\":\"AdminOnly\",\"desc\":\"\"}],\"type\":[{\"label\":\"Type:\",\"type\":\"menu\",\"value\":\"tags\",\"options\":\"tags,releases,commits\",\"default\":\"tags\",\"desc\":\"\"}],\"branch\":[{\"label\":\"Commit branch:\",\"type\":\"text\",\"value\":\"1.4.x\",\"default\":\"1.4.x\",\"desc\":\"\"}],\"commitCount\":[{\"label\":\"Commits count\",\"type\":\"text\",\"value\":\"20\",\"default\":\"20\",\"desc\":\"\"}],\"stableOnly\":[{\"label\":\"Offer upgrade to stable version only:\",\"type\":\"list\",\"value\":\"true\",\"options\":\"true,false\",\"default\":\"true\",\"desc\":\"\"}]}','0','','0','0'),
  ('11','userHelper','<strong>1.19.2</strong> addition to FormLister','0','5','0','\n/**\n * userHelper\n * \n * addition to FormLister\n * \n * @category    plugin\n * @version     1.19.2\n * @internal    @properties &model=Model;text;\\\\modUsers &logoutKey=Request key;text;logout &cookieName=Cookie Name;text;WebLoginPE &cookieLifetime=Cookie Lifetime, seconds;text;157680000 &maxFails=Max failed logins;text;3 &blockTime=Block for, seconds;text;3600 &trackWebUserActivity=Track web user activity;list;No,Yes;No\n * @internal    @events OnWebAuthentication,OnWebPageInit,OnPageNotFound,OnWebLogin\n * @internal    @modx_category Content\n * @internal    @disabled 1\n**/\n\nrequire MODX_BASE_PATH.\'assets/snippets/FormLister/plugin.userHelper.php\';\n','0','{\"model\":[{\"label\":\"Model\",\"type\":\"text\",\"value\":\"\\\\\\\\modUsers\",\"default\":\"\\\\\\\\modUsers\",\"desc\":\"\"}],\"logoutKey\":[{\"label\":\"Request key\",\"type\":\"text\",\"value\":\"logout\",\"default\":\"logout\",\"desc\":\"\"}],\"cookieName\":[{\"label\":\"Cookie Name\",\"type\":\"text\",\"value\":\"WebLoginPE\",\"default\":\"WebLoginPE\",\"desc\":\"\"}],\"cookieLifetime\":[{\"label\":\"Cookie Lifetime, seconds\",\"type\":\"text\",\"value\":\"157680000\",\"default\":\"157680000\",\"desc\":\"\"}],\"maxFails\":[{\"label\":\"Max failed logins\",\"type\":\"text\",\"value\":\"3\",\"default\":\"3\",\"desc\":\"\"}],\"blockTime\":[{\"label\":\"Block for, seconds\",\"type\":\"text\",\"value\":\"3600\",\"default\":\"3600\",\"desc\":\"\"}],\"trackWebUserActivity\":[{\"label\":\"Track web user activity\",\"type\":\"list\",\"value\":\"No\",\"options\":\"No,Yes\",\"default\":\"No\",\"desc\":\"\"}]}','1','','0','0'),
  ('12','userHelper','<strong>1.19.3</strong> addition to FormLister','0','5','0','require MODX_BASE_PATH.\'assets/snippets/FormLister/plugin.userHelper.php\';\n','0','{\"model\":[{\"label\":\"Model\",\"type\":\"text\",\"value\":\"\\\\\\\\modUsers\",\"default\":\"\\\\\\\\modUsers\",\"desc\":\"\"}],\"logoutKey\":[{\"label\":\"Request key\",\"type\":\"text\",\"value\":\"logout\",\"default\":\"logout\",\"desc\":\"\"}],\"cookieName\":[{\"label\":\"Cookie Name\",\"type\":\"text\",\"value\":\"WebLoginPE\",\"default\":\"WebLoginPE\",\"desc\":\"\"}],\"cookieLifetime\":[{\"label\":\"Cookie Lifetime, seconds\",\"type\":\"text\",\"value\":\"157680000\",\"default\":\"157680000\",\"desc\":\"\"}],\"maxFails\":[{\"label\":\"Max failed logins\",\"type\":\"text\",\"value\":\"3\",\"default\":\"3\",\"desc\":\"\"}],\"blockTime\":[{\"label\":\"Block for, seconds\",\"type\":\"text\",\"value\":\"3600\",\"default\":\"3600\",\"desc\":\"\"}],\"trackWebUserActivity\":[{\"label\":\"Track web user activity\",\"type\":\"list\",\"value\":\"No\",\"options\":\"No,Yes\",\"default\":\"No\",\"desc\":\"\"}]}','0','','0','0');

#
# Dumping data for table `dy5r_site_snippets`
#

INSERT INTO `dy5r_site_snippets` VALUES
  ('1','DLCrumbs','<strong>1.2</strong> DLCrumbs','0','6','0','return require MODX_BASE_PATH.\'assets/snippets/DocLister/snippet.DLCrumbs.php\';\n','0','[]','','0','0','0'),
  ('2','DLMenu','<strong>1.4.0</strong> Snippet to build menu with DocLister','0','6','0','return require MODX_BASE_PATH.\'assets/snippets/DocLister/snippet.DLMenu.php\';\n','0','[]','','0','0','0'),
  ('3','DLSitemap','<strong>1.0.2</strong> Snippet to build XML sitemap','0','5','0','return require MODX_BASE_PATH.\'assets/snippets/DocLister/snippet.DLSitemap.php\';\n','0','[]','','0','0','0'),
  ('4','DocInfo','<strong>0.4.1</strong> Take any field from any document (fewer requests than GetField)','0','5','0','return require MODX_BASE_PATH.\'assets/snippets/docinfo/snippet.docinfo.php\';\n','0','[]','','0','0','0'),
  ('5','DocLister','<strong>2.7.2</strong> Snippet to display the information of the tables by the description rules. The main goal - replacing Ditto and CatalogView','0','5','0','return require MODX_BASE_PATH.\'assets/snippets/DocLister/snippet.DocLister.php\';\n','0','[]','','0','0','0'),
  ('6','FormLister','<strong>1.19.3</strong> Form processor','0','5','0','return require MODX_BASE_PATH.\'assets/snippets/FormLister/snippet.FormLister.php\';\n','0','','','0','0','0'),
  ('7','if','<strong>1.3.1</strong> A simple conditional snippet. Allows for eq/neq/lt/gt/etc logic within templates, resources, chunks, etc.','0','6','0','return require MODX_BASE_PATH.\'assets/snippets/if/snippet.if.php\';','0','[]','','0','0','0'),
  ('8','phpthumb','<strong>1.4.1</strong> PHPThumb creates thumbnails and altered images on the fly and caches them','0','5','0','return require MODX_BASE_PATH.\'assets/snippets/phpthumb/snippet.phpthumb.php\';\n','0','[]','','0','0','0'),
  ('9','summary','<strong>2.0.2</strong> Truncates the string to the specified length','0','5','0','return require MODX_BASE_PATH.\'assets/snippets/summary/snippet.summary.php\';','0','[]','','0','0','0'),
  ('10','version','','0','2','0','\n$ver = $modx->runSnippet(\'DocInfo\', Array(\'docid\' => 1, \'field\' => \'version\'));\n$version = \'?v=\'. $ver;\n\nreturn $version;','0','{}',' ','1665860829','1666288582','0'),
  ('11','multiTV','<strong>2.0.16</strong> Custom Template Variabe containing a sortable multi item list or a datatable','0','5','0','return require MODX_BASE_PATH . \'assets/tvs/multitv/multitv.snippet.php\';\n','0','','','0','0','0'),
  ('12','debug','','0','0','0','\nforeach ($modx->documentObject as $key => $value) {\n		echo $key . \'<br>\';\n	}','0','{}',' ','1666252128','1666252603','0'),
  ('13','form','','0','13','0','\n$name = filter_input(INPUT_POST, \'name\', FILTER_SANITIZE_STRING);\n$phone = filter_input(INPUT_POST, \'phone\', FILTER_SANITIZE_STRING);\n$formid = filter_input(INPUT_POST, \'formid\', FILTER_SANITIZE_STRING);\n$form_name = filter_input(INPUT_POST, \'form_name\', FILTER_SANITIZE_STRING);\n$email = filter_input(INPUT_POST, \'email\', FILTER_SANITIZE_STRING);\n\n$recipient = $modx->runSnippet(\'DocInfo\', Array(\'docid\' => 1, \'field\' => \'to_email\'));\n\n$snippet_data = Array(\n	\'to\' => $recipient,\n	\'formid\' => $formid,\n	\'reportTpl\' => \'formReport\',\n	\'protectSubmit\' => 0,\n	\'submitLimit\' => 0,\n	\'api\' => 1,\n	\'subject\' => \'Заполнена форма «\'.$form_name .\'» на сайте \'. $modx->config[\'site_name\'],\n);\n\n$form = $modx->runSnippet(\'FormLister\', $snippet_data);\n\nreturn $form;','0','{}',' ','1666255188','1666286145','0');

#
# Dumping data for table `dy5r_site_templates`
#

INSERT INTO `dy5r_site_templates` VALUES
  ('3','Main page',NULL,'main page','0','0','','0','<!DOCTYPE html>\n<html lang=\"ru\">\n{{head}}\n<body>\n<main class=\"main\">\n    {{header}}\n    {{nav_links}}\n	\n    <section class=\"intro\">\n		{{main_slider}}\n		{{timer_form}}\n	</section>\n\n    {{models_nav}}\n\n    <section class=\"section\" id=\"models\">\n        <div class=\"container\">\n            <div class=\"models\">\n				[!DocLister? &parents=`3`\n				&tvList=`model_item_img, model_benefit`\n				&tpl=`model_item`\n				!]\n            </div>\n            <div id=\"disclaimer\" class=\"models__disclaimer disclaimer\">\n                <div class=\"disclaimer__container center\">\n                    <div class=\"models__disclaimer__title disclaimer__title js-disclaimer-service\">\n						Подробные условия акции\n                    </div>\n                    <div class=\"disclaimer__body-service js-disclaimer-service-body\" style=\"display: none;\">\n                       	[*model_disclaimer*]\n                    </div>\n                </div>\n            </div>\n        </div>\n    </section>\n	\n	{{stock}}\n	{{advantages}}\n	{{trade_in_section}}\n	{{map_contacts}}\n	{{main_dasclaimer}}\n	\n	{{callback_form}}\n	{{thanks_form}}\n\n</main>\n{{footer}}\n</body>\n</html>','0','1','0','1666282584'),
  ('6','banner',NULL,'Slider item','0','8','','0','','0','1','1666000594','1666000594'),
  ('8','services_item',NULL,'','0','10','','0','','0','1','1666117555','1666117555'),
  ('9','Service offer item',NULL,'','0','10','','0','','0','1','1666163425','1666163425'),
  ('4','Service page',NULL,'service page','0','10','','0','<!DOCTYPE html>\n<html lang=\"ru\">\n{{head}}\n<body>\n<main class=\"main\">\n    {{header}}\n    {{service_nav_links}}\n	\n	<section class=\"intro\">\n		{{service_slider_form}}\n		{{service_slider}}\n		{{timer_form}}\n	</section>\n	\n	{{service_nav}}\n	{{services_list}}\n	\n	{{appointment_to}}\n	\n	{{service_offers_list}}\n	\n	{{service_advantages}}\n	\n	{{get_consultation}}\n	\n	{{map_contacts}}\n	{{main_dasclaimer}}\n		\n	{{callback_form}}\n	{{service_special_offer_form}}\n	{{thanks_form}}\n   \n</main>\n{{footer}}\n</body>\n</html>','0','1','0','1666282657'),
  ('5','Model',NULL,'Model item','0','0','','0','','0','1','1665931799','1665943782');

#
# Dumping data for table `dy5r_site_tmplvar_access`
#

#
# Dumping data for table `dy5r_site_tmplvar_contentvalues`
#

INSERT INTO `dy5r_site_tmplvar_contentvalues` VALUES
  ('1','5','5','/dist/img/content/models/m1.webp'),
  ('2','5','6','/dist/img/content/models/m3.webp'),
  ('3','5','4','/dist/img/content/models/m6.webp'),
  ('6','6','5','{\"fieldValue\":[{\"key\":\"Рассрочка\",\"value\":\"0%\"},{\"key\":\"Бонус\",\"value\":\"Трейд-ин\"},{\"key\":\"Страхование\",\"value\":\"По специальным условиям\"},{\"key\":\"Ежемесячный платеж\",\"value\":\"по запросу\"}],\"fieldSettings\":{\"autoincrement\":1}}'),
  ('7','6','6','{\"fieldValue\":[{\"key\":\"Рассрочка\",\"value\":\"0%\"},{\"key\":\"Бонус\",\"value\":\"Трейд-ин\"},{\"key\":\"Страхование\",\"value\":\"По специальным условиям\"},{\"key\":\"Выгодный кредит\",\"value\":\"от 5 890 ₽/мес\"}],\"fieldSettings\":{\"autoincrement\":1}}'),
  ('8','6','4','{\"fieldValue\":[{\"key\":\"Рассрочка\",\"value\":\"0%\"},{\"key\":\"Бонус\",\"value\":\"Трейд-ин\"},{\"key\":\"Страхование\",\"value\":\"По специальным условиям\"},{\"key\":\"Выгодный кредит\",\"value\":\"от 7 720 ₽/мес\"}],\"fieldSettings\":{\"autoincrement\":1}}'),
  ('9','7','8','/dist/img/content/main.webp'),
  ('10','8','8','/dist/img/content/main-xs.webp'),
  ('11','7','9','/dist/img/content/kia-connect.webp'),
  ('12','8','9','/dist/img/content/kia-connect-xs.webp'),
  ('13','7','10','/dist/img/content/gift-month.webp'),
  ('14','8','10','/dist/img/content/gift-month-xs.webp'),
  ('19','9','8','false'),
  ('16','9','10','true'),
  ('18','9','9','false'),
  ('20','10','1','<p><small>Выгоды от дилера достигаются при покупке нового автомобиля Kia в период с 01.10.2022 по 31.10.2022 с учетом приобретения автомобиля по маркетинговым программам и/или: Trade-in, Кредит. Предложение ограничено. Подарки могут отличаться в зависимости от выбранной модели и комплектации. Подробности узнавайте в отделе продаж официального дилера Kia АВТОРУСЬ Бутово. Не является публичной офертой.</small></p>'),
  ('21','7','12','/dist/img/service/our-service/image-1.png'),
  ('22','7','13','/dist/img/service/our-service/image-2.png'),
  ('23','7','14','/dist/img/service/our-service/image-4.png'),
  ('24','7','15','/dist/img/service/our-service/image-5.png'),
  ('25','7','16','/dist/img/service/our-service/image-6.png'),
  ('26','7','17','/dist/img/service/our-service/image-7.png'),
  ('28','11','2','{\"fieldValue\":[{\"image\":\"/dist/img/service/cars/car-1.png\",\"title\":\"Soul\"},{\"image\":\"/dist/img/service/cars/car-2.png\",\"title\":\"Sportage\"},{\"image\":\"/dist/img/service/cars/car-3.png\",\"title\":\"K9\"},{\"image\":\"/dist/img/service/cars/car-4.png\",\"title\":\"Cerato\"},{\"image\":\"/dist/img/service/cars/car-5.png\",\"title\":\"Seltos\"},{\"image\":\"/dist/img/service/cars/car-6.png\",\"title\":\"K5\"},{\"image\":\"/dist/img/service/cars/car-7.png\",\"title\":\"Picanto\"},{\"image\":\"/dist/img/service/cars/car-8.png\",\"title\":\"Sorento\"},{\"image\":\"/dist/img/service/cars/car-9.png\",\"title\":\"Stinger\"},{\"image\":\"/dist/img/service/cars/car-10.png\",\"title\":\"Carnival\"},{\"image\":\"/dist/img/service/cars/car-11.png\",\"title\":\"Rio\"},{\"image\":\"/dist/img/service/cars/car-12.png\",\"title\":\"Rio X\"},{\"image\":\"/dist/img/service/cars/car-13.png\",\"title\":\"Ceed\"},{\"image\":\"/dist/img/service/cars/car-14.png\",\"title\":\"Ceed SW\"}],\"fieldSettings\":{\"autoincrement\":1}}'),
  ('29','7','19','/dist/img/service/spec/refiling.png'),
  ('30','7','20','/dist/img/service/spec/masloakpp.png'),
  ('31','7','21','/dist/img/service/spec/spec-22.png'),
  ('32','4','2','Сервис Kia'),
  ('33','4','1','Новый Kia по выгодной цене'),
  ('34','7','2','/dist/img/service/first-screen-image.jpg'),
  ('35','8','2','/dist/img/service/first-screen-image.jpg'),
  ('36','12','1','hausdr@gmail.com, test@test.com');

INSERT INTO `dy5r_site_tmplvar_contentvalues` VALUES
  ('37','13','1','0.0.5');

#
# Dumping data for table `dy5r_site_tmplvar_templates`
#

INSERT INTO `dy5r_site_tmplvar_templates` VALUES
  ('5','5','0'),
  ('6','5','0'),
  ('7','9','0'),
  ('8','4','0'),
  ('10','3','0'),
  ('9','6','0'),
  ('7','4','0'),
  ('11','4','0'),
  ('7','8','0'),
  ('4','4','0'),
  ('4','3','0'),
  ('7','6','0'),
  ('8','6','0'),
  ('12','3','0'),
  ('13','3','0');

#
# Dumping data for table `dy5r_site_tmplvars`
#

INSERT INTO `dy5r_site_tmplvars` VALUES
  ('1','textarea','desc','Meta description','Meta description','0','1','0','','0','','','[*introtext*]','0','0'),
  ('2','text','keyw','Meta keywords','Meta keywords','0','1','0','','0','','','[*pagetitle*]','0','0'),
  ('3','checkbox','noIndex','No index page','Meta robots','0','1','0','Нет==<meta name=\"robots\" content=\"noindex, nofollow\">','0','','','','0','0'),
  ('4','text','titl','Meta title','Meta title','0','1','0','','0','','','[*pagetitle*] - [(site_name)]','0','1666272065'),
  ('5','image','model_item_img','Model image','','0','7','0','','0','','&align=none&output=[+value+]','','1665944714','1665944714'),
  ('6','custom_tv:multitv','model_benefit','Model benefit','','0','7','0','','1','','&cpad=1&cspace=1&psize=100&ploc=top-right&egmsg=No records found&width=100&height=100&borsize=1&output=[+value+]','','1665945716','1665948782'),
  ('7','image','desktop_img','Image','','0','8','0','','0','','','','1666000479','1666284656'),
  ('8','image','mobile_img','Image mobile version','','0','8','0','','0','','','','1666000526','1666284665'),
  ('9','option','black_text','Black text on banner','','0','8','0','yes==true||no==false','0','','','no','1666001564','1666003186'),
  ('10','richtext','model_disclaimer','Model disclaimer','','0','5','0','','0','','','','1666007320','1666007494'),
  ('11','custom_tv:multitv','appointment_to','appointment for to','','0','10','0','','0','','&output=[+value+]&width=100&height=100&borsize=1&cpad=1&cspace=1&psize=100&ploc=top-right&egmsg=No records found','','1666119482','1666162366'),
  ('12','text','to_email','Form recipients','','0','0','0','','0','','','','1666285444','1666285444'),
  ('13','text','version','version','','0','5','0','','0','','','','1666288621','1666288647');

#
# Dumping data for table `dy5r_system_eventnames`
#

INSERT INTO `dy5r_system_eventnames` VALUES
  ('1','OnDocPublished','5',''),
  ('2','OnDocUnPublished','5',''),
  ('3','OnWebPagePrerender','5',''),
  ('4','OnWebLogin','3',''),
  ('5','OnBeforeWebLogout','3',''),
  ('6','OnWebLogout','3',''),
  ('7','OnWebSaveUser','3',''),
  ('8','OnWebDeleteUser','3',''),
  ('9','OnWebChangePassword','3',''),
  ('10','OnWebCreateGroup','3',''),
  ('11','OnManagerLogin','2',''),
  ('12','OnBeforeManagerLogout','2',''),
  ('13','OnManagerLogout','2',''),
  ('14','OnManagerSaveUser','2',''),
  ('15','OnManagerDeleteUser','2',''),
  ('16','OnManagerChangePassword','2',''),
  ('17','OnManagerCreateGroup','2',''),
  ('18','OnBeforeCacheUpdate','4',''),
  ('19','OnCacheUpdate','4',''),
  ('20','OnMakePageCacheKey','4',''),
  ('21','OnLoadWebPageCache','4',''),
  ('22','OnBeforeSaveWebPageCache','4',''),
  ('23','OnChunkFormPrerender','1','Chunks'),
  ('24','OnChunkFormRender','1','Chunks'),
  ('25','OnBeforeChunkFormSave','1','Chunks'),
  ('26','OnChunkFormSave','1','Chunks'),
  ('27','OnBeforeChunkFormDelete','1','Chunks'),
  ('28','OnChunkFormDelete','1','Chunks'),
  ('29','OnDocFormPrerender','1','Documents'),
  ('30','OnDocFormRender','1','Documents'),
  ('31','OnBeforeDocFormSave','1','Documents');

INSERT INTO `dy5r_system_eventnames` VALUES
  ('32','OnDocFormSave','1','Documents'),
  ('33','OnBeforeDocFormDelete','1','Documents'),
  ('34','OnDocFormDelete','1','Documents'),
  ('35','OnDocFormUnDelete','1','Documents'),
  ('36','onBeforeMoveDocument','1','Documents'),
  ('37','onAfterMoveDocument','1','Documents'),
  ('38','OnPluginFormPrerender','1','Plugins'),
  ('39','OnPluginFormRender','1','Plugins'),
  ('40','OnBeforePluginFormSave','1','Plugins'),
  ('41','OnPluginFormSave','1','Plugins'),
  ('42','OnBeforePluginFormDelete','1','Plugins'),
  ('43','OnPluginFormDelete','1','Plugins'),
  ('44','OnSnipFormPrerender','1','Snippets'),
  ('45','OnSnipFormRender','1','Snippets'),
  ('46','OnBeforeSnipFormSave','1','Snippets'),
  ('47','OnSnipFormSave','1','Snippets'),
  ('48','OnBeforeSnipFormDelete','1','Snippets'),
  ('49','OnSnipFormDelete','1','Snippets'),
  ('50','OnTempFormPrerender','1','Templates'),
  ('51','OnTempFormRender','1','Templates'),
  ('52','OnBeforeTempFormSave','1','Templates'),
  ('53','OnTempFormSave','1','Templates'),
  ('54','OnBeforeTempFormDelete','1','Templates'),
  ('55','OnTempFormDelete','1','Templates'),
  ('56','OnTVFormPrerender','1','Template Variables'),
  ('57','OnTVFormRender','1','Template Variables'),
  ('58','OnBeforeTVFormSave','1','Template Variables'),
  ('59','OnTVFormSave','1','Template Variables'),
  ('60','OnBeforeTVFormDelete','1','Template Variables'),
  ('61','OnTVFormDelete','1','Template Variables'),
  ('62','OnUserFormPrerender','1','Users');

INSERT INTO `dy5r_system_eventnames` VALUES
  ('63','OnUserFormRender','1','Users'),
  ('64','OnBeforeUserFormSave','1','Users'),
  ('65','OnUserFormSave','1','Users'),
  ('66','OnBeforeUserFormDelete','1','Users'),
  ('67','OnUserFormDelete','1','Users'),
  ('68','OnWUsrFormPrerender','1','Web Users'),
  ('69','OnWUsrFormRender','1','Web Users'),
  ('70','OnBeforeWUsrFormSave','1','Web Users'),
  ('71','OnWUsrFormSave','1','Web Users'),
  ('72','OnBeforeWUsrFormDelete','1','Web Users'),
  ('73','OnWUsrFormDelete','1','Web Users'),
  ('74','OnSiteRefresh','1',''),
  ('75','OnFileManagerUpload','1',''),
  ('76','OnModFormPrerender','1','Modules'),
  ('77','OnModFormRender','1','Modules'),
  ('78','OnBeforeModFormDelete','1','Modules'),
  ('79','OnModFormDelete','1','Modules'),
  ('80','OnBeforeModFormSave','1','Modules'),
  ('81','OnModFormSave','1','Modules'),
  ('82','OnBeforeWebLogin','3',''),
  ('83','OnWebAuthentication','3',''),
  ('84','OnBeforeManagerLogin','2',''),
  ('85','OnManagerAuthentication','2',''),
  ('86','OnLoadSettings','1','System Settings'),
  ('87','OnSiteSettingsRender','1','System Settings'),
  ('88','OnFriendlyURLSettingsRender','1','System Settings'),
  ('89','OnUserSettingsRender','1','System Settings'),
  ('90','OnInterfaceSettingsRender','1','System Settings'),
  ('91','OnSecuritySettingsRender','1','System Settings'),
  ('92','OnFileManagerSettingsRender','1','System Settings'),
  ('93','OnMiscSettingsRender','1','System Settings');

INSERT INTO `dy5r_system_eventnames` VALUES
  ('94','OnRichTextEditorRegister','1','RichText Editor'),
  ('95','OnRichTextEditorInit','1','RichText Editor'),
  ('96','OnManagerPageInit','2',''),
  ('97','OnWebPageInit','5',''),
  ('98','OnLoadDocumentObject','5',''),
  ('99','OnBeforeLoadDocumentObject','5',''),
  ('100','OnAfterLoadDocumentObject','5',''),
  ('101','OnLoadWebDocument','5',''),
  ('102','OnParseDocument','5',''),
  ('103','OnParseProperties','5',''),
  ('104','OnBeforeParseParams','5',''),
  ('105','OnManagerLoginFormRender','2',''),
  ('106','OnWebPageComplete','5',''),
  ('107','OnLogPageHit','5',''),
  ('108','OnBeforeManagerPageInit','2',''),
  ('109','OnBeforeEmptyTrash','1','Documents'),
  ('110','OnEmptyTrash','1','Documents'),
  ('111','OnManagerLoginFormPrerender','2',''),
  ('112','OnStripAlias','1','Documents'),
  ('113','OnMakeDocUrl','5',''),
  ('114','OnBeforeLoadExtension','5',''),
  ('115','OnCreateDocGroup','1','Documents'),
  ('116','OnManagerWelcomePrerender','2',''),
  ('117','OnManagerWelcomeHome','2',''),
  ('118','OnManagerWelcomeRender','2',''),
  ('119','OnBeforeDocDuplicate','1','Documents'),
  ('120','OnDocDuplicate','1','Documents'),
  ('121','OnManagerMainFrameHeaderHTMLBlock','2',''),
  ('122','OnManagerPreFrameLoader','2',''),
  ('123','OnManagerFrameLoader','2',''),
  ('124','OnManagerTreeInit','2','');

INSERT INTO `dy5r_system_eventnames` VALUES
  ('125','OnManagerTreePrerender','2',''),
  ('126','OnManagerTreeRender','2',''),
  ('127','OnManagerNodePrerender','2',''),
  ('128','OnManagerNodeRender','2',''),
  ('129','OnManagerMenuPrerender','2',''),
  ('130','OnManagerTopPrerender','2',''),
  ('131','OnDocFormTemplateRender','1','Documents'),
  ('132','OnBeforeMinifyCss','1',''),
  ('133','OnPageUnauthorized','1',''),
  ('134','OnPageNotFound','1',''),
  ('135','OnFileBrowserUpload','1','File Browser Events'),
  ('136','OnBeforeFileBrowserUpload','1','File Browser Events'),
  ('137','OnFileBrowserDelete','1','File Browser Events'),
  ('138','OnBeforeFileBrowserDelete','1','File Browser Events'),
  ('139','OnFileBrowserInit','1','File Browser Events'),
  ('140','OnFileBrowserMove','1','File Browser Events'),
  ('141','OnBeforeFileBrowserMove','1','File Browser Events'),
  ('142','OnFileBrowserCopy','1','File Browser Events'),
  ('143','OnBeforeFileBrowserCopy','1','File Browser Events'),
  ('144','OnBeforeFileBrowserRename','1','File Browser Events'),
  ('145','OnFileBrowserRename','1','File Browser Events'),
  ('146','OnLogEvent','1','');

#
# Dumping data for table `dy5r_system_settings`
#

INSERT INTO `dy5r_system_settings` VALUES
  ('settings_version','1.4.20'),
  ('manager_theme','default'),
  ('server_offset_time','0'),
  ('manager_language','russian-UTF8'),
  ('modx_charset','UTF-8'),
  ('site_name','KIA'),
  ('site_start','1'),
  ('error_page','1'),
  ('unauthorized_page','1'),
  ('site_status','1'),
  ('auto_template_logic','sibling'),
  ('default_template','3'),
  ('old_template','3'),
  ('publish_default','1'),
  ('friendly_urls','1'),
  ('friendly_alias_urls','1'),
  ('use_alias_path','1'),
  ('cache_type','2'),
  ('failed_login_attempts','3'),
  ('blocked_minutes','60'),
  ('use_captcha','0'),
  ('emailsender',''),
  ('use_editor','1'),
  ('use_browser','1'),
  ('fe_editor_lang','russian-UTF8'),
  ('fck_editor_toolbar','standard'),
  ('fck_editor_autolang','0'),
  ('editor_css_path',''),
  ('editor_css_selectors',''),
  ('upload_maxsize','10485760'),
  ('manager_layout','4');

INSERT INTO `dy5r_system_settings` VALUES
  ('auto_menuindex','1'),
  ('session.cookie.lifetime','604800'),
  ('mail_check_timeperiod','600'),
  ('manager_direction','ltr'),
  ('xhtml_urls','0'),
  ('automatic_alias','1'),
  ('datetime_format','dd-mm-YYYY'),
  ('warning_visibility','0'),
  ('remember_last_tab','1'),
  ('enable_bindings','1'),
  ('seostrict','1'),
  ('number_of_results','30'),
  ('theme_refresher',''),
  ('show_picker','0'),
  ('show_newresource_btn','0'),
  ('show_fullscreen_btn','0'),
  ('email_sender_method','1'),
  ('site_id','6349a18f384c7'),
  ('a','30'),
  ('site_unavailable_page',''),
  ('reload_site_unavailable',''),
  ('site_unavailable_message','В настоящее время сайт недоступен.'),
  ('siteunavailable_message_default','russian-UTF8'),
  ('chunk_processor',''),
  ('enable_at_syntax','0'),
  ('enable_filter','0'),
  ('cache_default','0'),
  ('search_default','1'),
  ('custom_contenttype','application/rss+xml,application/pdf,application/vnd.ms-word,application/vnd.ms-excel,text/html,text/css,text/xml,text/javascript,text/plain,application/json'),
  ('docid_incrmnt_method','0'),
  ('enable_cache','0');

INSERT INTO `dy5r_system_settings` VALUES
  ('disable_chunk_cache','1'),
  ('disable_snippet_cache','1'),
  ('disable_plugins_cache','0'),
  ('minifyphp_incache','0'),
  ('server_protocol','http'),
  ('rss_url_news',''),
  ('track_visitors','0'),
  ('friendly_url_prefix',''),
  ('friendly_url_suffix',''),
  ('make_folders','0'),
  ('aliaslistingfolder','0'),
  ('allow_duplicate_alias','0'),
  ('use_udperms','1'),
  ('udperms_allowroot','0'),
  ('email_method','mail'),
  ('smtp_auth','0'),
  ('smtp_secure','none'),
  ('smtp_host','smtp.example.com'),
  ('smtp_port','25'),
  ('smtp_username','you@example.com'),
  ('reload_emailsubject',''),
  ('emailsubject','Данные для авторизации'),
  ('emailsubject_default','Данные для авторизации'),
  ('reload_signupemail_message',''),
  ('signupemail_message','Здравствуйте, [+uid+]!\n\nВаши данные для авторизации в системе управления сайтом [+sname+]:\n\nИмя пользователя: [+uid+]\nПароль: [+pwd+]\n\nПосле успешной авторизации в системе управления сайтом ([+surl+]), вы сможете изменить свой пароль.\n\nС уважением, Администрация'),
  ('system_email_signup_default','Здравствуйте, [+uid+]!\n\nВаши данные для авторизации в системе управления сайтом [+sname+]:\n\nИмя пользователя: [+uid+]\nПароль: [+pwd+]\n\nПосле успешной авторизации в системе управления сайтом ([+surl+]), вы сможете изменить свой пароль.\n\nС уважением, Администрация'),
  ('reload_websignupemail_message',''),
  ('websignupemail_message','Здравствуйте, [+uid+]!\n\nВаши данные для авторизации на [+sname+]:\n\nИмя пользователя: [+uid+]\nПароль: [+pwd+]\n\nПосле успешной авторизации на [+sname+] ([+surl+]), вы сможете изменить свой пароль.\n\nС уважением, Администрация'),
  ('system_email_websignup_default','Здравствуйте, [+uid+]!\n\nВаши данные для авторизации на [+sname+]:\n\nИмя пользователя: [+uid+]\nПароль: [+pwd+]\n\nПосле успешной авторизации на [+sname+] ([+surl+]), вы сможете изменить свой пароль.\n\nС уважением, Администрация'),
  ('reload_system_email_webreminder_message',''),
  ('webpwdreminder_message','Здравствуйте, [+uid+]!\n\nЧтобы активировать ваш новый пароль, перейдите по следующей ссылке:\n\n[+surl+]\n\nПозже вы сможете использовать следующий пароль для авторизации: [+pwd+]\n\nЕсли это письмо пришло к вам по ошибке, пожалуйста, проигнорируйте его.\n\nС уважением, Администрация');

INSERT INTO `dy5r_system_settings` VALUES
  ('system_email_webreminder_default','Здравствуйте, [+uid+]!\n\nЧтобы активировать ваш новый пароль, перейдите по следующей ссылке:\n\n[+surl+]\n\nПозже вы сможете использовать следующий пароль для авторизации: [+pwd+]\n\nЕсли это письмо пришло к вам по ошибке, пожалуйста, проигнорируйте его.\n\nС уважением, Администрация'),
  ('manager_theme_mode','3'),
  ('login_logo','assets/images/favicon.png'),
  ('login_bg',''),
  ('login_form_position','left'),
  ('login_form_style','dark'),
  ('manager_menu_position','top'),
  ('tree_page_click','27'),
  ('use_breadcrumbs','0'),
  ('global_tabs','1'),
  ('group_tvs','1'),
  ('resource_tree_node_name','pagetitle'),
  ('session_timeout','15'),
  ('tree_show_protected','0'),
  ('datepicker_offset','-10'),
  ('number_of_logs','100'),
  ('number_of_messages','40'),
  ('which_editor','TinyMCE4'),
  ('tinymce4_theme','custom'),
  ('tinymce4_skin','lightgray'),
  ('tinymce4_skintheme','inlite'),
  ('tinymce4_template_docs',''),
  ('tinymce4_template_chunks',''),
  ('tinymce4_entermode','p'),
  ('tinymce4_element_format','html'),
  ('tinymce4_schema','html5'),
  ('tinymce4_custom_plugins','advlist autolink lists link image charmap print preview hr anchor pagebreak searchreplace wordcount visualblocks visualchars code fullscreen spellchecker insertdatetime media nonbreaking save table contextmenu directionality emoticons template paste textcolor codesample colorpicker textpattern imagetools paste modxlink youtube'),
  ('tinymce4_custom_buttons1','undo redo | cut copy paste | searchreplace | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent blockquote | styleselect'),
  ('tinymce4_custom_buttons2','link unlink anchor image media codesample table | hr removeformat | subscript superscript charmap | nonbreaking | visualchars visualblocks print preview fullscreen code formatselect'),
  ('tinymce4_custom_buttons3',''),
  ('tinymce4_custom_buttons4','');

INSERT INTO `dy5r_system_settings` VALUES
  ('tinymce4_blockFormats','Paragraph=p;Header 1=h1;Header 2=h2;Header 3=h3'),
  ('allow_eval','with_scan'),
  ('safe_functions_at_eval','time,date,strtotime'),
  ('check_files_onlogin','index.php\n.htaccess\nmanager/index.php\nmanager/includes/config.inc.php'),
  ('validate_referer','1'),
  ('rss_url_security',''),
  ('error_reporting','1'),
  ('send_errormail','0'),
  ('pwd_hash_algo','UNCRYPT'),
  ('reload_captcha_words',''),
  ('captcha_words','EVO,Access,Better,BitCode,Chunk,Cache,Desc,Design,Excell,Enjoy,URLs,TechView,Gerald,Griff,Humphrey,Holiday,Intel,Integration,Joystick,Join(),Oscope,Genetic,Light,Likeness,Marit,Maaike,Niche,Netherlands,Ordinance,Oscillo,Parser,Phusion,Query,Question,Regalia,Righteous,Snippet,Sentinel,Template,Thespian,Unity,Enterprise,Verily,Tattoo,Veri,Website,WideWeb,Yap,Yellow,Zebra,Zygote'),
  ('captcha_words_default','EVO,Access,Better,BitCode,Chunk,Cache,Desc,Design,Excell,Enjoy,URLs,TechView,Gerald,Griff,Humphrey,Holiday,Intel,Integration,Joystick,Join(),Oscope,Genetic,Light,Likeness,Marit,Maaike,Niche,Netherlands,Ordinance,Oscillo,Parser,Phusion,Query,Question,Regalia,Righteous,Snippet,Sentinel,Template,Thespian,Unity,Enterprise,Verily,Tattoo,Veri,Website,WideWeb,Yap,Yellow,Zebra,Zygote'),
  ('filemanager_path','D:/Domains/modx-evolution/'),
  ('upload_files','bmp,ico,gif,jpeg,jpg,png,psd,tif,tiff,fla,flv,swf,aac,au,avi,css,cache,doc,docx,gz,gzip,htaccess,htm,html,js,mp3,mp4,mpeg,mpg,ods,odp,odt,pdf,ppt,pptx,rar,tar,tgz,txt,wav,wmv,xls,xlsx,xml,z,zip,JPG,JPEG,PNG,GIF,svg,tpl'),
  ('upload_images','bmp,ico,gif,jpeg,jpg,png,psd,tif,tiff,svg'),
  ('upload_media','au,avi,mp3,mp4,mpeg,mpg,wav,wmv'),
  ('upload_flash','fla,flv,swf'),
  ('new_file_permissions','0644'),
  ('new_folder_permissions','0755'),
  ('which_browser','mcpuk'),
  ('rb_webuser','0'),
  ('rb_base_dir','D:/Domains/modx-evolution/assets/'),
  ('rb_base_url','assets/'),
  ('clean_uploaded_filename','1'),
  ('strip_image_paths','1'),
  ('maxImageWidth','2600'),
  ('maxImageHeight','2200'),
  ('clientResize','0'),
  ('noThumbnailsRecreation','0'),
  ('thumbWidth','150'),
  ('thumbHeight','150');

INSERT INTO `dy5r_system_settings` VALUES
  ('thumbsDir','.thumbs'),
  ('jpegQuality','90'),
  ('denyZipDownload','0'),
  ('denyExtensionRename','0'),
  ('showHiddenFiles','0'),
  ('lang_code','ru'),
  ('sys_files_checksum','a:4:{s:35:\"D:/Domains/modx-evolution/index.php\";s:32:\"62aec542f3fd84f47f91d2248fa59153\";s:35:\"D:/Domains/modx-evolution/.htaccess\";s:32:\"9ec89ab44f6c292e882901270d6eba7f\";s:43:\"D:/Domains/modx-evolution/manager/index.php\";s:32:\"bb667738d2d80c29198903030ec6e657\";s:57:\"D:/Domains/modx-evolution/manager/includes/config.inc.php\";s:32:\"76ea8923528c3936ff3bd3e07a36e14b\";}'),
  ('full_aliaslisting','0');

#
# Dumping data for table `dy5r_user_attributes`
#

INSERT INTO `dy5r_user_attributes` VALUES
  ('1','1','Admin','1','','','','0','0','0','3','1666176487','1666195690','0','67ggjeqnf4rqi2doj2ukrqmj790l5d16','0','0','','','','','','','','','0','0','1');

#
# Dumping data for table `dy5r_user_messages`
#

#
# Dumping data for table `dy5r_user_roles`
#

INSERT INTO `dy5r_user_roles` VALUES
  ('2','Editor','Limited to managing content','1','1','1','1','1','1','1','0','1','1','1','0','0','0','0','0','0','0','0','1','0','0','0','0','0','0','0','1','0','1','0','1','1','1','1','1','0','1','1','1','0','0','1','0','0','0','0','0','0','0','0','0','0','0','0','0','0','1','0','0','0','0','0','0','0','1','0','0','1','1','1'),
  ('3','Publisher','Editor with expanded permissions including manage users, update Elements and site settings','1','1','1','1','1','1','1','1','1','1','1','0','1','1','1','0','0','1','1','1','1','1','1','0','0','0','0','1','1','1','1','1','1','1','1','1','0','1','1','1','1','1','1','0','0','0','0','0','1','0','0','0','0','0','0','0','0','1','0','0','1','1','1','1','0','1','0','0','1','1','1'),
  ('1','Administrator','Site administrators have full access to all functions','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1');

#
# Dumping data for table `dy5r_user_settings`
#

INSERT INTO `dy5r_user_settings` VALUES
  ('1','_LAST_tree_sortby','menuindex'),
  ('1','_LAST_tree_sortdir','ASC'),
  ('1','_LAST_tree_nodename','default');

#
# Dumping data for table `dy5r_web_groups`
#

#
# Dumping data for table `dy5r_web_user_attributes`
#

#
# Dumping data for table `dy5r_web_user_settings`
#

#
# Dumping data for table `dy5r_web_users`
#

#
# Dumping data for table `dy5r_webgroup_access`
#

#
# Dumping data for table `dy5r_webgroup_names`
#


# --------------------------------------------------------

SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;

SET @@sql_mode := @old_sql_mode ;


# --------------------------------------------------------

