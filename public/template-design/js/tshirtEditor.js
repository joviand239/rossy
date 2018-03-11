var canvas,canvas2;
var tshirts = new Array(); //prototype: [{style:'x',color:'white',front:'a',back:'b',price:{tshirt:'12.95',frontPrint:'4.99',backPrint:'4.99',total:'22.47'}}]
var a;
var b;
var line1;
var line2;
var line3;
var line4;

 	$(document).ready(function() {
 		$('#card-back-container').css('display','none');
 		$(".back-props").css('display','none');
		//setup front side canvas 
 		canvas = new fabric.Canvas('tcanvas', {
		  	hoverCursor: 'pointer',
		  	selection: true,
		  	selectionBorderColor:'black'
		});
		canvas.backgroundColor = "#F0F0F0";
		canvas.renderAll();
		canvas.on("after:render", function(){ canvas.calcOffset() });

		canvas2 = new fabric.Canvas('bcanvas', {
		  	hoverCursor: 'pointer',
		  	selection: true,
		  	selectionBorderColor:'black',		  	
		});

		canvas2.backgroundColor = "#13afa2";
		canvas2.renderAll();
		canvas2.on("after:render", function(){ canvas2.calcOffset() });
 		canvas.on({
			'object:moving': function(e) {		  	
				e.target.opacity = 0.5;
			},
			'object:modified': function(e) {		  	
			    e.target.opacity = 1;
			},
			'object:selected':onObjectSelected,
			'selection:cleared':onSelectedCleared
		});
		canvas2.on({
			'object:moving': function(e) {		  	
				e.target.opacity = 0.5;
			},
			'object:modified': function(e) {		  	
			    e.target.opacity = 1;
			},
			'object:selected':onObjectSelected,
			'selection:cleared':onSelectedCleared
		});
		// piggyback on `canvas.findTarget`, to fire "object:over" and "object:out" events
 		canvas.findTarget = (function(originalFn) {
		  	return function() {
		    	var target = originalFn.apply(this, arguments);
		    	if (target) {
		      		if (this._hoveredTarget !== target) {
		    	  		canvas.fire('object:over', { target: target });
		        		if (this._hoveredTarget) {
		        			canvas.fire('object:out', { target: this._hoveredTarget });
		        	}
		        	this._hoveredTarget = target;
		      	}
		    } else if (this._hoveredTarget) {
		    	canvas.fire('object:out', { target: this._hoveredTarget });
		      	this._hoveredTarget = null;
		    }
		    	return target;
			};
		})(canvas.findTarget);

		canvas2.findTarget = (function(originalFn) {
		  	return function() {
		    	var target = originalFn.apply(this, arguments);
		    	if (target) {
		      		if (this._hoveredTarget !== target) {
		    	  		canvas2.fire('object:over', { target: target });
		        		if (this._hoveredTarget) {
		        			canvas2.fire('object:out', { target: this._hoveredTarget });
		        	}
		        	this._hoveredTarget = target;
		      	}
		    } else if (this._hoveredTarget) {
		    	canvas2.fire('object:out', { target: this._hoveredTarget });
		      	this._hoveredTarget = null;
		    }
		    	return target;
			};
		})(canvas2.findTarget);

 		canvas.on('object:over', function(e) {		
		  //e.target.setFill('red');
		  //canvas.renderAll();
		});
		
 		canvas.on('object:out', function(e) {		
		  //e.target.setFill('green');
		  //canvas.renderAll();
		});

		canvas2.on('object:over', function(e) {		
		  //e.target.setFill('red');
		  //canvas.renderAll();
		});
		
 		canvas2.on('object:out', function(e) {		
		  //e.target.setFill('green');
		  //canvas.renderAll();
		});
		 		 	 
		document.getElementById('add-text').onclick = function() {
			var text = $("#text-string").val();
		    var textSample = new fabric.Text(text, {
		      	left: fabric.util.getRandomInt(0, 200),
		      	top: fabric.util.getRandomInt(0, 400),
		      	fontFamily: 'helvetica',
		      	angle: 0,
		      	fill: '#000000',
		      	scaleX: 0.5,
		      	scaleY: 0.5,
		      	fontWeight: '',
	  		  	hasRotatingPoint:true
		    });		    
            canvas.add(textSample);	
            canvas.item(canvas.item.length-1).hasRotatingPoint = true;    
            $("#texteditor").css('display', 'block');
            $("#imageeditor").css('visibility', 'visible');
	  	};
	  	$("#text-string").keyup(function(){	  		
	  		var activeObject = canvas.getActiveObject();
		      if (activeObject && activeObject.type === 'text') {
		    	  activeObject.text = this.value;
		    	  canvas.renderAll();
		      }
	  	});
 
	  	$('#fileupload').change(function(e){
	  		var src;
	  		var num = 0;
	  		if (this.files && this.files[0]) {
	            var reader = new FileReader();
	            
	            reader.onload = function (e) {	               
	                src = e.target.result;
	                $('#test').attr('src',src);
	               	$('#image-list').append('<img src="'+src+'" class="col-sm-4 image-option">');
	            }
	           
	            reader.readAsDataURL(this.files[0]);

	        }
	  	});

	  	$('#image-list').on('click','.image-option',function(e) {
	  		var el = e.target;
	  		/*temp code*/
	  		var offset = 50;
	        var left = fabric.util.getRandomInt(0 + offset, 200 - offset);
	        var top = fabric.util.getRandomInt(0 + offset, 400 - offset);
	        var angle = fabric.util.getRandomInt(-20, 40);
	        var width = fabric.util.getRandomInt(30, 50);
	        var opacity = (function(min, max){ return Math.random() * (max - min) + min; })(0.5, 1);
	        var canvasObject;
	  		// if ($('#flip').attr('data-facing') === 'front') {
	  		// 	canvasObject = canvas;
	  		// } else {
	  		// 	canvasObject = canvas2;
	  		// }
	        
	  		fabric.Image.fromURL(el.src, function(image) {
		        image.set({
		            left: left,
		            top: top,
		            angle: 0,
		            padding: 10,
		            cornersize: 10,
	      	  		hasRotatingPoint:true
		        });
		        image.scaleToWidth(300);
		        canvas.add(image);	
	        });

	        fabric.Image.fromURL(el.src, function(image) {
		        image.set({
		            left: left,
		            top: top,
		            angle: 0,
		            padding: 10,
		            cornersize: 10,
	      	  		hasRotatingPoint:true
		        });
		        image.scaleToWidth(300);
		        canvas2.add(image);
	        });
	  	})

	  	$('#add-rectangle').on('click',function(){
	  		var triangle = new fabric.Triangle({
  				width: 20, height: 30, fill: 'blue', left: 50, top: 50
			});

			canvas.add(triange);
			canvas2.add(triangle)
	  	});

	  	document.getElementById('remove-selected').onclick = function() {
	  		var canvasObject;
	  		if ($('#flip').attr('data-facing') === 'front') {
	  			canvasObject = canvas;
	  		} else {
	  			canvasObject = canvas2;
	  		}

			var activeObject = canvasObject.getActiveObject(),
	        activeGroup = canvasObject.getActiveGroup();
	    	if (activeObject) {
		      	canvasObject.remove(activeObject);
		      	$("#text-string").val("");
		    } else if (activeGroup) {
		      	var objectsInGroup = activeGroup.getObjects();
		      	canvasObject.discardActiveGroup();
		      	objectsInGroup.forEach(function(object) {
		        	canvasObject.remove(object);
		      	});
		    }

	  	};
	  			
	  	$("#show-preview").click(function(){
	  		var frontCanvas = canvas.toSVG();
	  		var backCanvas = canvas2.toSVG();

			$('#card-preview-back').append(backCanvas);
			$('#card-preview-front').append(frontCanvas);
	  	})
	  	$("#text-bold").click(function() {
		  	var activeObject = canvas.getActiveObject();
		  	if (activeObject && activeObject.type === 'text') {
		    	activeObject.fontWeight = (activeObject.fontWeight == 'bold' ? '' : 'bold');		    
		    	canvas.renderAll();
		  	}
		});
	  	$("#text-italic").click(function() {
		  	var activeObject = canvas.getActiveObject();
		  	if (activeObject && activeObject.type === 'text') {
			  	activeObject.fontStyle = (activeObject.fontStyle == 'italic' ? '' : 'italic');		    
		    	canvas.renderAll();
		  	}
		});
	  	$("#text-strike").click(function() {
		  	var activeObject = canvas.getActiveObject();
		  	if (activeObject && activeObject.type === 'text') {
			  	activeObject.textDecoration = (activeObject.textDecoration == 'line-through' ? '' : 'line-through');
		    	canvas.renderAll();
		  	}
		});
	  	$("#text-underline").click(function() {
		  	var activeObject = canvas.getActiveObject();
		  	if (activeObject && activeObject.type === 'text') {
			  	activeObject.textDecoration = (activeObject.textDecoration == 'underline' ? '' : 'underline');
		    	canvas.renderAll();
		  	}
		});
	  	$("#text-left").click(function() {
		  	var activeObject = canvas.getActiveObject();
		  	if (activeObject && activeObject.type === 'text') {
			  	activeObject.textAlign = 'left';
		    canvas.renderAll();
		  	}
		});
	  	$("#text-center").click(function() {
		  	var activeObject = canvas.getActiveObject();
		  	if (activeObject && activeObject.type === 'text') {
			  	activeObject.textAlign = 'center';		    
		    	canvas.renderAll();
		  	}
		});
	  	$("#text-right").click(function() {
		  	var activeObject = canvas.getActiveObject();
		  	if (activeObject && activeObject.type === 'text') {
			  	activeObject.textAlign = 'right';		    
		    	canvas.renderAll();
		  	}
		});	  
	  	$("#font-family").change(function() {
	      	var activeObject = canvas.getActiveObject();
	      	if (activeObject && activeObject.type === 'text') {
	        	activeObject.fontFamily = this.value;
	        	canvas.renderAll();
	      	}
	    });	  
		$('#text-bgcolor').miniColors({
			change: function(hex, rgb) {
			  	var activeObject = canvas.getActiveObject();
		      	if (activeObject && activeObject.type === 'text') {
		    	  	activeObject.backgroundColor = this.value;
		        	canvas.renderAll();
		      	}
			},
			open: function(hex, rgb) {
				//
			},
			close: function(hex, rgb) {
				//
			}
		});		
		$('#text-fontcolor').miniColors({
			change: function(hex, rgb) {
			  	var activeObject = canvas.getActiveObject();
		      	if (activeObject && activeObject.type === 'text') {
		    	  	activeObject.fill = this.value;
		    	  	canvas.renderAll();
		      	}
			},
			open: function(hex, rgb) {
				//
			},
			close: function(hex, rgb) {
				//
			}
		});
		
		$('#text-strokecolor').miniColors({
			change: function(hex, rgb) {
			  	var activeObject = canvas.getActiveObject();
		      	if (activeObject && activeObject.type === 'text') {
		    	  	activeObject.strokeStyle = this.value;
		    	  	canvas.renderAll();
		      	}
			},
			open: function(hex, rgb) {
				//
			},
			close: function(hex, rgb) {
				//
			}
		});
	
		//canvas.add(new fabric.fabric.Object({hasBorders:true,hasControls:false,hasRotatingPoint:false,selectable:false,type:'rect'}));
	  
	   
	   $('.color-preview').click(function(){
		   	var color = $(this).css("background-color");

		   	canvas.backgroundColor = color;
		   	canvas.renderAll();  
	   });
	   $('.color-preview-back').click(function(){
		   	var color = $(this).css("background-color");
		   	canvas2.backgroundColor = color;
		   	canvas2.renderAll();  
	   });
	   
	   $('#flip').click(function() {
		   	if ($(this).attr("data-facing") == "front") {
		   		$(this).attr('data-facing','back');
		   		$(this).attr('data-original-title', 'Show Front View');			        		       
		      
		        $('#card-front-container').css('display','none');
		        $('#card-back-container').css('display','block');
		        $('.front-props').css('display','none');
		        $('.back-props').css('display','block');		        
		        canvas.deactivateAll().renderAll();
		    } else {
		    	$(this).attr('data-facing','front');
		    	$(this).attr('data-original-title', 'Show Back View');			    				    	
		    	
		        $('#card-front-container').css('display','block');
		        $('#card-back-container').css('display','none');
		        $('.front-props').css('display','block');
		        $('.back-props').css('display','none');
		        canvas2.deactivateAll().renderAll();
		    }		   	
		    $('#imageeditor').css('visibility','hidden');
        });	   
	   	$(".clearfix button,a").tooltip();
	});//doc ready
	 
	 
	function getRandomNum(min, max) {
		return Math.random() * (max - min) + min;
	}
	 
	function onObjectSelected(e) {	 
	    var selectedObject = e.target;
	    $("#text-string").val("");
	    selectedObject.hasRotatingPoint = true
	    if (selectedObject && selectedObject.type === 'text') {
	    	//display text editor	    	
	    	$("#texteditor").css('display', 'block');
	    	$("#text-string").val(selectedObject.getText());	    	
	    	$('#text-fontcolor').miniColors('value',selectedObject.fill);
	    	$('#text-strokecolor').miniColors('value',selectedObject.strokeStyle);	
	    	$("#imageeditor").css('visibility', 'visible');
	    }
	    else if (selectedObject && selectedObject.type === 'image'){
	    	//display image editor
	    	$("#texteditor").css('display', 'none');	
	    	$("#imageeditor").css('visibility', 'visible');
	    }
	  }
	function onSelectedCleared(e){
		$("#texteditor").css('display', 'none');
		$("#text-string").val("");
		$("#imageeditor").css('visibility', 'hidden');
	}
	function setFont(font){
		var activeObject = canvas.getActiveObject();
	    if (activeObject && activeObject.type === 'text') {
	        activeObject.fontFamily = font;
	        canvas.renderAll();
	    }
	  }
	function removeWhite(){
		var activeObject = canvas.getActiveObject();
		if (activeObject && activeObject.type === 'image') {			  
			activeObject.filters[2] =  new fabric.Image.filters.RemoveWhite({hreshold: 100, distance: 10});//0-255, 0-255
			activeObject.applyFilters(canvas.renderAll.bind(canvas));
		}	        
	 }