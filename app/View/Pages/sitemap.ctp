<?php
/**
 * @author          Jan Bogdanski <janek.bogdanski@gmail.com>
 *
 * Creation date    16.02.13 20:40
 */
?>
<urlset xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd" xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">

    <url>
        <loc><?php echo Router::url('/',true); ?></loc>
        <changefreq>daily</changefreq>
        <priority>1.0</priority>
    </url>
    <url>
        <loc><?php echo Router::url('/aukcje',true); ?></loc>
        <changefreq>daily</changefreq>
        <priority>1.0</priority>
    </url>
    <url>
        <loc><?php echo Router::url('/galerie',true); ?></loc>
        <changefreq>daily</changefreq>
        <priority>1.0</priority>
    </url>
    <url>
        <loc><?php echo Router::url('/obrazy',true); ?></loc>
        <changefreq>daily</changefreq>
        <priority>1.0</priority>
    </url>
    <url>
        <loc><?php echo Router::url('/blog',true); ?></loc>
        <changefreq>daily</changefreq>
        <priority>1.0</priority>
    </url>
<?php foreach ($blogPosts as $blogPost):?>
    <url>
        <loc><?php echo Router::url(array('plugin' => 'blog', 'controller' => 'blog_posts', 'action' => 'view', 'slug' => $blogPost['BlogPost']['slug']),true); ?></loc>
        <lastmod><?php echo $this->Time->toAtom($blogPost['BlogPost']['modified']); ?></lastmod>
        <priority>0.8</priority>
    </url>
<?php endforeach; ?>
</urlset>