/*-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
FUNCTION CALLBACKS
-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-*/
jQuery(function(){
 	// Superfish
	jQuery(".sf-menu").superfish({
		pathClass:  'current' 
    });
	//Image Preloads
	jQuery(".imgborder").preloadify({force_icon:"true", mode:"sequence" });
});