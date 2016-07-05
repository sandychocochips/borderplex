/* SQL Queries */
UPDATE wp_options SET option_value = replace(option_value, 'http://www.oldsiteurl.com', 'http://www.newsiteurl.com') WHERE option_name = 'home' OR option_name = 'siteurl';
UPDATE wp_posts SET guid = REPLACE (guid, 'http://www.oldsiteurl.com', 'http://www.newsiteurl.com');
UPDATE wp_posts SET post_content = REPLACE (post_content, 'http://www.oldsiteurl.com', 'http://www.newsiteurl.com');
UPDATE wp_posts SET post_content = REPLACE (post_content, 'src="http://www.oldsiteurl.com', 'src="http://www.newsiteurl.com');
UPDATE wp_postmeta SET meta_value = REPLACE (meta_value, 'http://www.oldsiteurl.com','http://www.newsiteurl.com');