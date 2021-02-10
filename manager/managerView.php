
<p class="question">Správa moderátora
  <a class="small" href="javascript:void(0)" style="position: fixed; margin-top: 12px; margin-left: 8px;" onclick="copyTextToClipboard('http:/\/goralia.online/mindquiz?managerPassword=<?php echo $managerPassword ?>'); alert('Token zkopírován')">
    <i class="fas fa-share-square" style="color: #700"></i>
  </a>
</p>
<div class="answers">
    <a href="/mindquiz/manager/dictionary.php">Slovník</a>
</div>

<script>

function fallbackCopyTextToClipboard(text) {
  var textArea = document.createElement("textarea");
  textArea.value = text;
  
  // Avoid scrolling to bottom
  textArea.style.top = "0";
  textArea.style.left = "0";
  textArea.style.position = "fixed";

  document.body.appendChild(textArea);
  textArea.focus();
  textArea.select();

  try {
    var successful = document.execCommand('copy');
    var msg = successful ? 'successful' : 'unsuccessful';
    console.log('Fallback: Copying text command was ' + msg);
  } catch (err) {
    console.error('Fallback: Oops, unable to copy', err);
  }

  document.body.removeChild(textArea);
}

function copyTextToClipboard(text) {
  if (!navigator.clipboard) {
    fallbackCopyTextToClipboard(text);
    return;
  }
  navigator.clipboard.writeText(text).then(function() {
    console.log('Async: Copying to clipboard was successful!');
  }, function(err) {
    console.error('Async: Could not copy text: ', err);
  });
}

</script>