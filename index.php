<!DOCTYPE html>
<html lang="en">
  <head>
    <title>XML Form using PHP</title>
  </head>
  <body>
<?php
  if (isset($_REQUEST['add'])) {
    $doc = new DOMDocument("1.0", "utf-8");
    $doc->preserveWhiteSpace = false;
    $doc->formatOutput = true;
    $doc->load("rss.xml");
    
    $channel = $doc->getElementsByTagName("channel")->item(0);
    $item = $doc->createElement("item");
    $title2 = $doc->createElement("title", $_REQUEST['rssform__titleval']);
    $link2 = $doc->createElement("link", $_REQUEST['rssform__linkval']);
    $author = $doc->createElement("author", $_REQUEST['rssform__authorval']);
    $pubDate = $doc->createElement("pubDate", $_REQUEST['rssform__pubdateval']);
    $desc2 = $doc->createElement("description", $_REQUEST['rssform__descval']);
    $item->appendChild($title2);
    $item->appendChild($link2);
    $item->appendChild($author);
    $item->appendChild($pubDate);
    $item->appendChild($desc2);
    $channel->appendChild($item);
    $doc->documentElement->appendChild($channel);
    $doc->save("rss.xml");
    
    $count = $doc->getElementsByTagName("item")->length;
    $items = $doc->getElementsByTagName("item")->item(0);
    if ($count > 5) {
      $channel->removeChild($items);
      $doc->save("rss.xml");
    }
  }
?>
    <h1>Add RSS Feed</h1>
    <form action="index.php" method="post">
      <div>
        <label for="rssform__title">Title: </label>
        <input type="text" id="rssform__title" name="rssform__titleval" placeholder="Blog Post Title" />
      </div>
      <div>
        <label for="rssform__link">Link: </label>
        <input type="text" id="rssform__link" name="rssform__linkval" placeholder="http://webdev18a.ca/blog/title-of-the-post" />
      </div>
      <div>
        <label for="rssform__author">Author: </label>
        <input type="text" id="rssform__author" name="rssform__authorval" placeholder="John Doe" />
      </div>
      <div>
        <label for="rssform__pubdate">Published date: </label>
        <input type="text" id="rssform__pubdate" name="rssform__pubdateval" placeholder="mm-dd-yyyy" />
      </div>
      <div>
        <label for="rssform__desc">Description: </label>
        <input type="text" id="rssform__desc" name="rssform__descval" placeholder="Blog post description" />
      </div>
      <input type="submit" value="Add to feed" name="add" />
    </form>
  </body>
</html>