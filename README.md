# HTTP5203-A-Lab5
## Lab 5: XML DOM

Using .NET or PHP, create a form which allows you to insert items into an RSS feed (see XML Extras). You can hard-code channel info in the RSS file, but the form is what creates the RSS feed items. You only need the article title, link, author, pubDate and description. Restrict the RSS feed to only have five items at a time (so remove the oldest item if you insert and there were already five in the list).  In other words build a basic RSS file like so:

```
<rss version="2.0">
   <channel>
      <!--the channel info-->
    <title>...</title>
    <link>...</link>
    <description>...</description>
    <!--the feed items-->
    <item>
      <!--each item's info, usually article info--> 
     <title> ... </title>
     <link> ... </link>
     <author> ... </author>
     <pubDate> ... </pubDate>
     <description> ... </description> 
    </item>
    <item>
      ...<!--item 2-->... 
    </item>
  </channel>
</rss>
```

You need to insert elements using a form you build with either .NET or PHP.  You can have a pre-existing RSS file with hardcoded channel info because this info doesn't usually change.  Only the <item> elements need to change.  As <item> elements are inserted, if the number of <item> elements exceeds 5, you need to remove one in order to restrict the max <item> elements to 5.  In other words, your feed will always contain the 5 most recently added <item> elements.
