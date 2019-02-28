<?php namespace App\Support\Frontend;

class Transformer
{
    public static function handle($string)
    {
        $methods = array_flip(get_class_methods(self::class));
        $replacements = $matches = [];
        preg_match_all('/(?<=\[\[).*(?=\]\])/U', $string, $bbCodeMatches);
        preg_match_all('/(?<=```).*(?=```)/Us', $string, $rawCodeMatches);

        if (count($bbCodeMatches[0]) > 0) {
            foreach ($bbCodeMatches[0] as $bb) {
                $p = explode('|', $bb, 3);
                if (isset($methods[$p[0]])) {
                    $replacements[] = static::{array_shift($p)}($p);
                } else {
                    $replacements[] = $bb;
                }
            }
        }
        if (count($rawCodeMatches[0]) > 0) {
            foreach ($rawCodeMatches[0] as $bb) {
                $p = explode('|', $bb, 2);
                $replacements[] = static::code($p);
            }
        }
        if (!empty($replacements)) {
            return str_replace(['[[', ']]', '```'], '', str_replace(
                    array_merge($bbCodeMatches[0], $rawCodeMatches[0]),
                    $replacements,
                    $string
                )
            );
        }
        return $string;
    }

    public static function link($d)
    {
        return sprintf('<a href="%s">%s</a>', isset($d[1]) ? $d[1] : '', isset($d[0]) ? $d[0] : '');
    }

    public static function image($d)
    {
        return sprintf('<figure><img src="%s" alt="%s"/><figcaption>%s</figcaption></figure>',
            $d[1],
            $d[0],
            $d[2]);
    }

    public static function code($d)
    {
        return sprintf('<pre class="prettyprint linenums %s">%s</pre>',
            isset($d[0]) ? 'lang-' . $d[0] : '',
            $d[1]
        );
    }

    public static function maps($d)
    {
        preg_match('/^https?\:\/\/(?:www\.)?google\.[a-z]+\/maps\/(.*)/', $d[0], $m);
        if (isset($m[1])) {
            return sprintf('<iframe src="https://www.google.com/maps/embed/v1/%s" 
frameborder="0" allowfullscreen></iframe>',
                $m[1]);
        }
        return $d;

    }

    public static function youtube($d)
    {
        preg_match('/http(?:s?):\/\/(?:www\.)?youtu(?:be\.com\/watch\?v=|\.be\/)([\w\-\_]*)(&(amp;)?‌​[\w\?‌​=]*)?/',
            $d[0], $m);
        if (isset($m[1])) {
            return sprintf('<div class="embed-container">
<iframe src="https://www.youtube.com/embed/%s" frameborder="0" allowfullscreen></iframe>
</div>',
                $m[1]);
        }
        return $d;
    }

    public static function twitter($d)
    {
        $twitterIdPosition = strrpos($d[0], '/');
        if ($twitterIdPosition !== false) {
            return sprintf('<div id="tweet-%s" class="twitter-container"></div>',
                substr($d[0], $twitterIdPosition + 1));
        }
        return $d;
    }

}