<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Bible {

  /** @const */
  private static $catalog = array (
      "Genesis" => array("創", "創世紀", "Gen", 0),
      "Exodus" => array("出", "出埃及記", "Exod", 0),
      "Leviticus" => array("利", "利未記", "Lev", 0),
      "Numbers" => array("民", "民數記", "Num", 0),
      "Deuteronomy" => array("申", "申命記", "Deut", 0),
      "Joshua" => array("書", "約書亞記", "Josh", 0),
      "Judges" => array("士", "士師記", "Judg", 0),
      "Ruth" => array("得", "路得記", "Ruth", 0),
      "1 Samuel" => array("撒上", "撒母耳記上", "1Sam", 0),
      "2 Samuel" => array("撒下", "撒母耳記下", "2Sam", 0),
      "1 Kings" => array("王上", "列王紀上", "1Kgs", 0),
      "2 Kings" => array("王下", "列王紀下", "2Kgs", 0),
      "1 Chronicles" => array("代上", "歷代志上", "1Chr", 0),
      "2 Chronicles" => array("代下", "歷代志下", "2Chr", 0),
      "Ezra" => array("拉", "以斯拉記", "Ezra", 0),
      "Nehemiah" => array("尼", "尼希米記", "Neh", 0),
      "Esther" => array("斯", "以斯帖記", "Esth", 0),
      "Job" => array("伯", "約伯記", "Job", 0),
      "Psalms" => array("詩", "詩篇", "Ps", 0),
      "Proverbs" => array("箴", "箴言", "Prov", 0),
      "Ecclesiastes" => array("傳", "傳道書", "Eccl", 0),
      "Song of Songs" => array("歌", "雅歌", "Song", 0),
      "Isaiah" => array("賽", "以賽亞書", "Isa", 0),
      "Jeremiah" => array("耶", "耶利米書", "Jer", 0),
      "Lamentations" => array("哀", "耶利米哀歌", "Lam", 0),
      "Ezekiel" => array("結", "以西結書", "Ezek", 0),
      "Daniel" => array("但", "但以理書", "Dan", 0),
      "Hosea" => array("何", "何西阿書", "Hos", 0),
      "Joel" => array("珥", "約珥書", "Joel", 0),
      "Amos" => array("摩", "阿摩司書", "Amos", 0),
      "Obadiah" => array("俄", "俄巴底亞書", "Obad", 0),
      "Jonah" => array("拿", "約拿書", "Jonah", 0),
      "Micah" => array("彌", "彌迦書", "Mic", 0),
      "Nahum" => array("鴻", "那鴻書", "Nah", 0),
      "Habakkuk" => array("哈", "哈巴谷書", "Hab", 0),
      "Zephaniah" => array("番", "西番雅書", "Zeph", 0),
      "Haggai" => array("該", "哈該書", "Hag", 0),
      "Zechariah" => array("亞", "撒迦利亞書", "Zech", 0),
      "Malachi" => array("瑪", "瑪拉基書", "Mal", 0),

      "Matthew" => array("太", "馬太福音", "Matt", 1),
      "Mark" => array("可", "馬可福音", "Mark", 1),
      "Luke" => array("路", "路加福音", "Luke", 1),
      "John" => array("約", "約翰福音", "John", 1),
      "Acts" => array("徒", "使徒行傳", "Acts", 1),
      "Romans" => array("羅", "羅馬書", "Rom", 1),
      "1 Corinthians" => array("林前", "哥林多前書", "1Cor", 1),
      "2 Corinthians" => array("林後", "哥林多後書", "2Cor", 1),
      "Galatians" => array("加", "加拉太書", "Gal", 1),
      "Ephesians" => array("弗", "以弗所書", "Eph", 1),
      "Philippians" => array("腓", "腓利比書", "Phil", 1),
      "Colossians" => array("西", "歌羅西書", "Col", 1),
      "1 Thessalonians" => array("帖前", "帖撒羅尼迦前書", "1Thess", 1),
      "2 Thessalonians" => array("帖後", "帖撒羅尼迦後書", "2Thess", 1),
      "1 Timothy" => array("提前", "提摩太前書", "1Tim", 1),
      "2 Timothy" => array("提後", "提摩太後書", "2Tim", 1),
      "Titus" => array("多", "提多書", "Titus", 1),
      "Philemon" => array("門", "腓利門書", "Phlm", 1),
      "Hebrews" => array("來", "希伯來書", "Heb", 1),
      "James" => array("雅", "雅各書", "Jas", 1),
      "1 Peter" => array("彼前", "彼得前書", "1Pet", 1),
      "2 Peter" => array("彼後", "彼得後書", "2Pet", 1),
      "1 John" => array("約壹", "約翰壹書", "1John", 1),
      "2 John" => array("約貳", "約翰貳書", "2John", 1),
      "3 John" => array("約參", "約翰參書", "3John", 1),
      "Jude" => array("猶", "猶大書", "Jude", 1),
      "Revelation" => array("啟", "啟示錄", "Rev", 1)
  );

  const REQUEST_URL = 'http://api.preachingcentral.com/bible.php?';
  const VERSION = 'union-traditional';

  static function getArrayTitles()
  {
    return self::$catalog;
  }

  static function getChTitle($engTitle, $abbr = true)
  {
    if ($abbr)
    {
      return self::$catalog[$engTitle][0];
    }
    else
    {
      return self::$catalog[$engTitle][1];
    }
  }
  
  static function getBookId($engTitle)
  {
  	return self::$catalog[$engTitle][2];
  }
  
  static function getDamId($engTitle)
  {
  	if (self::$catalog[$engTitle][3] == 0) {
  		return "CHNUNVO1ET";
  	} else {
  		return "CHNUNVN1ET";
  	}
  }

  /**
   * Convert the English ranges string to Chinese abbreviation
   * e.g. "John 1:1-3" => "約 1:1-3"
   */
  static function convertEngRangesToCh($ranges, $abbr = true)
  {
    $string = $ranges;
    $token = strtok($string, ",");
    while ($token != false)
    {
      $pos = strpos($token, ":");
      if ($pos !== false)
      {
        // remove leading and tailing spaces of book and chapter, e.g." Acts 3 "
        $token = trim(substr($token, 0, $pos));
        $pos = strrpos($token, " ");
        if ($pos > 1) // avoid to pick space in book name
        {
          $token = substr($token, 0, $pos);
        }

        // now we have book name
        // only replace the first matching string to avoid "1 John" etc. be considered as "John"
        $pos = strpos($ranges, $token);
        if ($pos !== false) {
          $ranges = substr_replace($ranges, self::getChTitle($token, $abbr), $pos, strlen($token));
        }
      }

      $token = strtok(",");
    }

    return $ranges;
  }

  /**
   * Given ranges, e.g. "John 3:1-3, 5", returns a parsed SimpleXMLElement object $xml.
   *
   * For each $xml->range
   * $xml->range->result is the title "John 3:1-3" for this range
   * $xml->range->item->text is the verses
   * You could also get book name, chapter, etc from $xml->range->item
   */
  static function getVerses($ranges)
  {
    // send a REST request and get XML response
    $url = self::REQUEST_URL . 'passage=' . urlencode($ranges) . '&version=' . self::VERSION;
    
    log_message("info", "requesting bible api: " . $url );

    $content = @file_get_contents($url);
    
    log_message("info", "bible api response: " . $content);

    // Parse the XML into a SimpleXML object
    $xml = new SimpleXMLElement($content);
        
    return $xml;
  }
}
