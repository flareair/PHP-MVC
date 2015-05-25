<?php

http_response_code(404);

?>
<div class="container">
  <h1>Error 404</h1>
  <p>Page <b><?=$requestUri; ?></b> not found.</p>
</div>