<?php

namespace Vina;

class Youtube {

	public function FreeLeech($url) {
		echo $url . '---> url para baixar.';
	}

    // public function FreeLeech($url)
    // {
    //     $url = preg_replace('/https?:\/\/(www.)?/i', 'http://www.', $url);
    //     $parse = parse_url($url);
    //     $video_id = explode("v=", $parse['query']);
    //     $video_id = $video_id[1];
    //     if (stristr($video_id, "&")) {
    //         $video_id = explode("&", $video_id);
    //         $video_id = $video_id[0];
    //     }

    //     $data = $this->lib->curl('http://www.youtube.com/get_video_info?video_id=' . $video_id . '&asv=3&el=detailpage&hl=en_US&s' . 't' . 's' . '=0', "", "", 0);

    //     $response = array_map('urldecode', $this->FormToArr(substr($data, strpos($data, "\r\n\r\n") + 4)));

    //     if (!empty($response['reason'])) {
    //         $this->error('[' . htmlentities($response['errorcode']) . '] ' . htmlentities($response['reason']), true, false);
    //     }

    //     if (isset($_REQUEST['step']) || preg_match('@Location: https?://(www\.)?youtube\.com/das_captcha@i', $data)) {
    //         $this->error("ytb_captcha", true, false);
    //     }

    //     if (empty($response['url_encoded_fmt_stream_map'])) {
    //         $this->error("ytb_Error", true, false);
    //     }

    //     $fmt_url_maps = explode(',', $response['url_encoded_fmt_stream_map']);

    //     $this->fmts = array(38, 37, 46, 22, 45, 44, 35, 43, 34, 18, 6, 5, 36, 17);
    //     $yt_fmt = empty($_REQUEST['yt_fmt']) ? '' : $_REQUEST['yt_fmt'];
    //     $this->fmturlmaps = $this->GetVideosArr($fmt_url_maps);

    //     if (isset($_REQUEST['ytube_mp4']) && $_REQUEST['ytube_mp4'] == 'on' && !empty($yt_fmt)) {
    //         //look for and download the highest quality we can find?
    //         if ($yt_fmt == 'highest') {
    //             foreach ($this->fmts as $fmt) {
    //                 if (array_key_exists($fmt, $this->fmturlmaps)) {
    //                     $furl = $this->fmturlmaps[$fmt];
    //                     break;
    //                 }
    //             }

    //         } elseif (!$furl = $this->fmturlmaps[$yt_fmt]) {
    //             $this->error('Specified video format not found', true, false);
    //         } else {
    //             $fmt = $yt_fmt;
    //         }

    //     } else { //just get the one Youtube plays by default (in some cases it could also be the highest quality format)
    //         $fmt = key($this->fmturlmaps);
    //         $furl = $this->fmturlmaps[$fmt];
    //     }

    //     $ext = '.flv';
    //     $fmtexts = array('.mp4' => array(18, 22, 37, 38), '.webm' => array(43, 44, 45, 46), '.3gp' => array(36, 17));
    //     foreach ($fmtexts as $k => $v) {
    //         if (!is_array($v)) {
    //             $v = array($v);
    //         }

    //         if (in_array($fmt, $v)) {
    //             $ext = $k;
    //             break;
    //         }
    //     }

    //     if (empty($response['title'])) {
    //         $this->error('No video title found! Download halted.', true, false);
    //     }

    //     //$this->lib->reserved['filename'] = str_replace(str_split('\\:*?"<>|=;'."\t\r\n\f"), '_', html_entity_decode(trim($response['title']), ENT_QUOTES));
    //     //if (!empty($_REQUEST['cleanname'])) $this->lib->reserved['filename'] = preg_replace('@[^ A-Za-z_\-\d\.,\(\)\[\]\{\}&\!\'\@\%\#]@u', '_', $this->lib->reserved['filename']);
    //     //$this->lib->reserved['filename'] .= " [YT-f$fmt][{$video_id}]$ext";
    //     $this->lib->reserved['filename'] = urldecode(urldecode(str_replace(str_split('\\/:*?"<>|'), '_', html_entity_decode(trim($response['title']), ENT_QUOTES)))) . "$ext";
    //     return trim($furl);
    //     return false;
    // }



































    // private function FormToArr($content, $v1 = '&', $v2 = '=')
    // {
    //     $rply = array();
    //     if (strpos($content, $v1) === false || strpos($content, $v2) === false) {
    //         return $rply;
    //     }

    //     foreach (array_filter(array_map('trim', explode($v1, $content))) as $v) {
    //         $v = array_map('trim', explode($v2, $v, 2));
    //         if ($v[0] != '') {
    //             $rply[$v[0]] = $v[1];
    //         }

    //     }
    //     return $rply;
    // }

    // private function GetVideosArr($fmtmaps)
    // {
    //     $fmturls = array();
    //     foreach ($fmtmaps as $fmtlist) {
    //         $fmtlist = array_map('urldecode', $this->FormToArr($fmtlist));
    //         if (!in_array($fmtlist['itag'], $this->fmts)) {
    //             continue;
    //         }

    //         $fmtlist['url'] = parse_url($fmtlist['url']);
    //         $fmtlist['url']['query'] = array_map('urldecode', $this->FormToArr($fmtlist['url']['query']));
    //         if (empty($fmtlist['url']['query']['signature'])) {
    //             $fmtlist['url']['query']['signature'] = (!empty($fmtlist['s']) ? $this->sigDecode($fmtlist['s']) : $fmtlist['sig']);
    //         }

    //         foreach (array_diff(array_keys($fmtlist), array('signature', 'sig', 's', 'url')) as $k) {
    //             $fmtlist['url']['query'][$k] = $fmtlist[$k];
    //         }

    //         ksort($fmtlist['url']['query']);
    //         $fmtlist['url']['query'] = http_build_query($fmtlist['url']['query']);
    //         $fmturls[$fmtlist['itag']] = $this->rebuild_url($fmtlist['url']);
    //     }
    //     return $fmturls;
    // }

    // private function sigDecode($sig)
    // {
    //     $this->error('Encoded signature found D:', true, false);
    // }

    // private function rebuild_url($url)
    // {
    //     return $url['scheme'] . '://' . (!empty($url['user']) && !empty($url['pass']) ? rawurlencode($url['user']) . ':' . rawurlencode($url['pass']) . '@' : '') . $url['host'] . (!empty($url['port']) && $url['port'] != 80 && $url['port'] != 443 ? ':' . $url['port'] : '') . (empty($url['path']) ? '/' : $url['path']) . (!empty($url['query']) ? '?' . $url['query'] : '') . (!empty($url['fragment']) ? '#' . $url['fragment'] : '');
    // }

}

/*
 * Open Source Project
 * New Vinaget by LTT
 * Version: 3.3 LTS
 * Youtube.com Download Plugin
 * Date: 01.09.2018
 */