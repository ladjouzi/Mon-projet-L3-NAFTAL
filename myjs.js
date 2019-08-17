(function () {
				var storage={};
				function init () {
						var dragdiv=document.getElementById('dragdiv');
						dragdiv.addEventListener('mouseover',function (e) {
							dragdiv.innerHTML="Maintenir<br>pour<br>déplacer";
							dragdiv.style.textAlign = 'center';
							dragdiv.style.fontWeight = 'bold';
							dragdiv.style.textShadow = '0px 1px 2px black';
						});
						dragdiv.addEventListener('mouseout',function (e) {
							dragdiv.innerHTML="";
						});
						dragdiv.addEventListener('mousedown',function (e) {
	                        storage.target=dragdiv.parentNode;
							storage.offsetX=e.clientX-storage.target.offsetLeft;
							storage.offsetY=e.clientY-storage.target.offsetTop;
						},false);
						dragdiv.addEventListener('mouseup',function () {
							storage= {};
			
						},false); 
						document.addEventListener('mousemove',function (e) {
						if(storage.target)
						{
							storage.target.style.top=e.clientY-storage.offsetY+'px';
							storage.target.style.left=e.clientX-storage.offsetX+'px';
						}
					

					},false);
				}
             init();

			})();		