<nav>
    <a class="<?php
    if ($pathParts['filename'] == "index") {
        print 'activePage';
    }
    ?>" href="index.php">Home</a>

<a class="<?php
    if ($pathParts['filename'] == "articles") {
        print 'activePage';
    }
    ?>" href="articles.php">Articles</a>

<a class="<?php
    if ($pathParts['filename'] == "art") {
        print 'activePage';
    }
    ?>" href="art.php">Art</a>

<a class="<?php
    if ($pathParts['filename'] == "contact") {
        print 'activePage';
    }
    ?>" href="contact.php">Contact</a>
</nav>