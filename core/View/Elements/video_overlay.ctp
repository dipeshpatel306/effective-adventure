<div id="videooverlay"></div>
  <div id="videocontainer">
    <p><a href="#" class='closeVideo'>Close [x]</a></p>
    <center>
      <div id="mediaplayer"></div>
      <?php if (isset($form)): ?>
      <div class='videoForm floatLeft hidden'><p><?php echo $form; ?></p></div>
      <?php endif; ?>
      <p class='imgsub'>Click on <img title="Fullscreen" src="/img/Fullscreen.png" alt="" width="30" height="21" /> above to view in fullscreen mode!</p>
    </center>
</div>