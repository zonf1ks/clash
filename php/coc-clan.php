<?php
  ####################################################################
  # EDIT CLASH OF CLANS TOKEN
  # ------------------------------------------------------------------
  # Get your API key from the following website.
  # https://developer.clashofclans.com/
  ####################################################################
  $token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzUxMiIsImtpZCI6IjI4YTMxOGY3LTAwMDAtYTFlYi03ZmExLTJjNzQzM2M2Y2NhNSJ9.eyJpc3MiOiJzdXBlcmNlbGwiLCJhdWQiOiJzdXBlcmNlbGw6Z2FtZWFwaSIsImp0aSI6IjkyMWU3NTAyLTU5OGEtNDZkOC1iZWI0LWJiYmUyMjdlOTAwYyIsImlhdCI6MTY3NjAzNTE1MCwic3ViIjoiZGV2ZWxvcGVyL2IwNDA3NDNmLTg0MWYtMjQ5My1mYjhiLTMxZGJlMmU0ZTg4NiIsInNjb3BlcyI6WyJjbGFzaCJdLCJsaW1pdHMiOlt7InRpZXIiOiJkZXZlbG9wZXIvc2lsdmVyIiwidHlwZSI6InRocm90dGxpbmcifSx7ImNpZHJzIjpbIjE4NS4xOTkuMTA4LjE1MyJdLCJ0eXBlIjoiY2xpZW50In1dfQ.DFE1S4vjfgJLCyVyTCTGYbGfkOBDe6Wj1yk-p97liWETjWAK9tcFCK7rQqVip9lcNCEobe8ADf4gc1iWL0ct8w";

  ####################################################################
  # EDIT CLASH OF CLANS CLAN TAG
  # ------------------------------------------------------------------
  # Input your Clan tag #, don't forget the # sign.
  ####################################################################
  $clantag = "#QLRQQQO";


  ####################################################################
  # DO NOT MODIFY ANYTHING BELOW THIS COMMENT
  ####################################################################
  $playertag = $_GET['player'];


  header('Content-Type: text/html; charset=UTF-8');

  if ($playertag) {
    $url = "https://api.clashofclans.com/v1/players/" . urlencode($playertag);
  } else {
    $url = "https://api.clashofclans.com/v1/clans/" . urlencode($clantag);
  }

  $ch = curl_init($url);

  $headr = array();
  $headr[] = "Accept: application/json";
  $headr[] = "Authorization: Bearer ".$token;

  curl_setopt($ch, CURLOPT_HTTPHEADER, $headr);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

  $res = curl_exec($ch);
  echo json_encode(json_decode($res, true), JSON_PRETTY_PRINT);
  curl_close($ch);

?>
