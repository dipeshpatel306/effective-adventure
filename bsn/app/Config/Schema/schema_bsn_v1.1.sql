insert into groups (`id`, `name`, `created`, `modified`) values(5, 'Partner Administrators', now(), now());
alter table users add column `partner_id` int(11) after `client_id`;
alter table partners drop column `company`;
alter table partners add column `admin_account` varchar(10) after `email`; 
alter table partners add column `active` tinyint(1) after `link`;
update clients set name='BSN' where id=1;
update clients set account_type='Admin' where id=1;
