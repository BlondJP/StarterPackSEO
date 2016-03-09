<?php

class SeoAnalyzer
{
  public static function isAWordInASentence($needle, $haystack)
  {
    return preg_match( '#\b' . preg_quote( $needle, '#' ) . '\b#i', $haystack ) !== 0;
  }
}
