/* SQL Queries */
UPDATE bdplx_options SET option_value = replace(option_value, 'http://localhost/borderplex', 'http://nodo.pw/borderplex') WHERE option_name = 'home' OR option_name = 'siteurl';
UPDATE bdplx_posts SET guid = REPLACE (guid, 'http://localhost/borderplex', 'http://nodo.pw/borderplex');
UPDATE bdplx_posts SET post_content = REPLACE (post_content, 'http://localhost/borderplex', 'http://nodo.pw/borderplex');
UPDATE bdplx_posts SET post_content = REPLACE (post_content, 'src="http://localhost/borderplex', 'src="http://nodo.pw/borderplex');
UPDATE bdplx_postmeta SET meta_value = REPLACE (meta_value, 'http://localhost/borderplex','http://nodo.pw/borderplex');
UPDATE bdplx_options SET option_value = replace(option_value, 'http://elmaguire.local:575', 'http://nodo.pw/borderplex') WHERE option_name = 'home' OR option_name = 'siteurl';
UPDATE bdplx_posts SET guid = REPLACE (guid, 'http://elmaguire.local:575', 'http://nodo.pw/borderplex');
UPDATE bdplx_posts SET post_content = REPLACE (post_content, 'http://elmaguire.local:575', 'http://nodo.pw/borderplex');
UPDATE bdplx_posts SET post_content = REPLACE (post_content, 'src="http://elmaguire.local:575', 'src="http://nodo.pw/borderplex');
UPDATE bdplx_postmeta SET meta_value = REPLACE (meta_value, 'http://elmaguire.local:575','http://nodo.pw/borderplex');