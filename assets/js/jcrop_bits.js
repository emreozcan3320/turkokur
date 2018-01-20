$(function(){

    $('#jcrop_target').Jcrop({
      aspectRatio: 1,
	  setSelect:   [ 200,200,37,49 ],
      onSelect: updateCoords
    });

  });

  function updateCoords(c)
  {
    $('#x').val(c.x);
    $('#y').val(c.y);
    $('#w').val(c.w);
    $('#h').val(c.h);
  };

  function checkCoords()
  {
    if (parseInt($('#w').val())) return true;
    alert('Lütfen kırpılacak bölgeyi seçin ve onaylayın.');
    return false;
  };
//End JCrop Bits

	function cancelCrop(){
		//Refresh page
		top.location = 'upload.php';
		return false;
	}
