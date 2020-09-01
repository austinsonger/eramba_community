INSERT INTO `ldap_connectors` (`id`, `name`, `description`, `host`, `domain`, `port`, `ldap_bind_dn`, `ldap_bind_pw`, `ldap_base_dn`, `type`, `ldap_auth_filter`, `ldap_auth_attribute`, `ldap_name_attribute`, `ldap_email_attribute`, `ldap_memberof_attribute`, `ldap_grouplist_filter`, `ldap_grouplist_name`, `ldap_groupmemberlist_filter`, `ldap_group_account_attribute`, `ldap_group_fetch_email_type`, `ldap_group_email_attribute`, `ldap_group_mail_domain`, `status`, `workflow_status`, `workflow_owner_id`, `created`, `modified`, `edited`)
VALUES
	(1,'LDAP AUTH','NA','ad.eramba.org','eramba.org',389,'CN=Goran Galic,OU=Eramba,DC=ad,DC=eramba,DC=org','Password1!','DC=ad,DC=eramba,DC=org','authenticator','(&(objectcategory=user)(sAMAccountName=%USERNAME%))','sAMAccountName','displayName','mail','memberOf','','','','','email-attribute','','',1,0,NULL,'2019-05-28 11:36:05','2019-05-28 11:36:05',NULL),
	(2,'LDAP Group','NA','ad.eramba.org','eramba.org',389,'CN=Goran Galic,OU=Eramba,DC=ad,DC=eramba,DC=org','Password1!','DC=ad,DC=eramba,DC=org','group','(| (sn=%USERNAME%) )','','','','','(objectCategory=group)','distinguishedName','(&(objectCategory=user)(memberOf=%GROUP%))','samaccountname','email-attribute','mail','',1,0,NULL,'2019-05-28 11:37:11','2019-05-28 11:37:11',NULL);