<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package KSDT_WI23
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> 
    <meta name="author" content="KSDT Radio">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
    <style>
    body{
        background-image:url('<?php echo get_template_directory_uri();?>/img/gif/background.gif');
        background-repeat:no-repeat;
        background-size: cover;
        height: 100vh;
        padding:0;
        margin:0;

    }
    .flip-v-bg{
        background-repeat: no-repeat;

    }
    .flip-h-bg{
        background-repeat: no-repeat;
    }
    canvas{
        border:1px solid #000;
        display:none;
		position: absolute;
		top: 0px;
		left: 0px;
    }

    .topnav {
        overflow: hidden;
        background-color: #333;
		position: sticky;
		top: 0;
		margin-top: -40px;
    }

    .topnav a {
        float: left;
        color: #f2f2f2;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
        font-size: 17px;
    }

    .topnav a:hover {
        background-color: #ddd;
        color: black;
    }

    .topnav a.active {
        background-color: #04AA6D;
        color: white;
    }
    </style>
</head>


<body class="flip-v-bg">
    <div class="topnav">
        <ul class="nav navbar-nav navbar-right" style="list-style: none;">
            <?php $main_menu = wp_get_nav_menu_items('Main'); ?>
                <?php foreach ((array) $main_menu as $key => $menu_item): ?>
                <?php
                $title = $menu_item->title;
                $url = $menu_item->url;
                ?>
                <li class="nav-item">
                    <a href="<?php echo $url; ?>"><?php echo $title; ?></a>
                </li>
                <?php endforeach; ?>
        </ul>
    </div>
    <canvas id="canvas"></canvas>
</body>


<!-- Scripts section -->
<script>
const ctx = canvas.getContext("2d");

var myGif;
// Can not load gif cross domain unless it has CORS header
const gifURL = '<?php echo get_template_directory_uri();?>/img/gif/background.gif';
// timeout just waits till script has been parsed and executed
// then starts loading a gif
setTimeout(()=>{
    myGif = GIF();                  // creates a new gif  
    myGif.onerror = function(e){
       console.log("Gif loading error " + e.type);
    }
    myGif.load(gifURL);  

},0); 
// Function draws an image
function drawImage(image,x,y,scale,rot){
    ctx.setTransform(scale,0,0,scale,x,y);
    ctx.rotate(rot);
    ctx.drawImage(image,-image.width / 2, -image.height / 2);
}
// helper functions
const rand  = (min = 1, max = min + (min = 0)) => Math.random() * (max - min) + min;
const setOf     =(c,C)=>{var a=[],i=0;while(i<c){a.push(C(i++))}return a};
const eachOf    =(a,C)=>{var i=0;const l=a.length;while(i<l && C(a[i],i++,l)!==true);return i};
const mod = (v,m) => ((v % m) + m) % m;

// create 100 particles
const particles = setOf(100,() => {
    return {
      x : rand(innerWidth),
      y : rand(innerHeight),
      scale : rand(0.15, 0.5),
      rot : rand(Math.PI * 2),
      frame : 0,
      frameRate : rand(-2,2),
      dr : rand(-0.1,0.1),
      dx : rand(-4,4),
      dy : rand(-4,4),
   };
});
// Animate and draw 100 particles
function drawParticles(){
  eachOf(particles, part => {
     part.x += part.dx;
     part.y += part.dy;
     part.rot += part.dr;
     part.frame += part.frameRate;
     part.x = mod(part.x,innerWidth);
     part.y = mod(part.y,innerHeight);
     var frame = mod(part.frame ,myGif.frames.length) | 0;
 
     drawImage(myGif.frames[frame].image,part.x,part.y,part.scale,part.rot);
  });
}      


var w = canvas.width;
var h = canvas.height;
var cw = w / 2; // center 
var ch = h / 2;

// main update function
function update(timer) {
  ctx.setTransform(1, 0, 0, 1, 0, 0); // reset transform
  if (w !== innerWidth || h !== innerHeight) {
    cw = (w = canvas.width = innerWidth) / 2;
    ch = (h = canvas.height = innerHeight) / 2;
  } else {
    ctx.clearRect(0, 0, w, h);
  }
  if(myGif) { // If gif object defined
    if(!myGif.loading){  // if loaded
        // draw random access to gif frames
        drawParticles();
        drawImage(myGif.image,cw,ch,1,0); // displays the current frame.
    }else if(myGif.lastFrame !== null){  // Shows frames as they load
        ctx.drawImage(myGif.lastFrame.image,0,0); 
        ctx.fillStyle = "white";
        ctx.fillText("GIF loading frame " + myGif.frames.length ,10,21);
        ctx.fillText("GIF loading frame " + myGif.frames.length,10,19);
        ctx.fillText("GIF loading frame " + myGif.frames.length,9,20);
        ctx.fillText("GIF loading frame " + myGif.frames.length,11,20);
        ctx.fillStyle = "black";
        ctx.fillText("GIF loading frame " + myGif.frames.length,10,20);
        
    }
  
  }else{
        ctx.fillText("Waiting for GIF image ",10,20);
  
  }
  requestAnimationFrame(update);
}
requestAnimationFrame(update);

/*============================================================================
  Gif Decoder and player for use with Canvas API's

**NOT** for commercial use.

To use

    var myGif = GIF();                  // creates a new gif  
    var myGif = new GIF();              // will work as well but not needed as GIF() returns the correct reference already.    
    myGif.load("myGif.gif");            // set URL and load
    myGif.onload = function(event){     // fires when loading is complete
                                        //event.type   = "load"
                                        //event.path   array containing a reference to the gif
    }
    myGif.onprogress = function(event){ // Note this function is not bound to myGif
                                        //event.bytesRead    bytes decoded
                                        //event.totalBytes   total bytes
                                        //event.frame        index of last frame decoded
    }
    myGif.onerror = function(event){    // fires if there is a problem loading. this = myGif
                                        //event.type   a description of the error
                                        //event.path   array containing a reference to the gif
    }

Once loaded the gif can be displayed
    if(!myGif.loading){
        ctx.drawImage(myGif.image,0,0); 
    }
You can display the last frame loaded during loading

    if(myGif.lastFrame !== null){
        ctx.drawImage(myGif.lastFrame.image,0,0); 
    }


To access all the frames
    var gifFrames = myGif.frames; // an array of frames.

A frame holds various frame associated items.
    myGif.frame[0].image; // the first frames image
    myGif.frame[0].delay; // time in milliseconds frame is displayed for




Gifs use various methods to reduce the file size. The loaded frames do not maintain the optimisations and hold the full resolution frames as DOM images. This mean the memory footprint of a decode gif will be many time larger than the Gif file.
 */
const GIF = function () {
    // **NOT** for commercial use.
    var timerID;                          // timer handle for set time out usage
    var st;                               // holds the stream object when loading.
    var interlaceOffsets  = [0, 4, 2, 1]; // used in de-interlacing.
    var interlaceSteps    = [8, 8, 4, 2];
    var interlacedBufSize;  // this holds a buffer to de interlace. Created on the first frame and when size changed
    var deinterlaceBuf;
    var pixelBufSize;    // this holds a buffer for pixels. Created on the first frame and when size changed
    var pixelBuf;
    const GIF_FILE = { // gif file data headers
        GCExt   : 0xF9,
        COMMENT : 0xFE,
        APPExt  : 0xFF,
        UNKNOWN : 0x01, // not sure what this is but need to skip it in parser
        IMAGE   : 0x2C,
        EOF     : 59,   // This is entered as decimal
        EXT     : 0x21,
    };      
    // simple buffered stream used to read from the file 
    var Stream = function (data) { 
        this.data = new Uint8ClampedArray(data);
        this.pos  = 0;
        var len   = this.data.length;
        this.getString = function (count) { // returns a string from current pos of len count
            var s = "";
            while (count--) { s += String.fromCharCode(this.data[this.pos++]) }
            return s;
        };
        this.readSubBlocks = function () { // reads a set of blocks as a string
            var size, count, data  = "";
            do {
                count = size = this.data[this.pos++];
                while (count--) { data += String.fromCharCode(this.data[this.pos++]) }
            } while (size !== 0 && this.pos < len);
            return data;
        }
        this.readSubBlocksB = function () { // reads a set of blocks as binary
            var size, count, data = [];
            do {
                count = size = this.data[this.pos++];
                while (count--) { data.push(this.data[this.pos++]);}
            } while (size !== 0 && this.pos < len);
            return data;
        }
    };
    // LZW decoder uncompressed each frames pixels
    // this needs to be optimised.
    // minSize is the min dictionary as powers of two
    // size and data is the compressed pixels
    function lzwDecode(minSize, data) {
        var i, pixelPos, pos, clear, eod, size, done, dic, code, last, d, len;
        pos = pixelPos = 0;
        dic      = [];
        clear    = 1 << minSize;
        eod      = clear + 1;
        size     = minSize + 1;
        done     = false;
        while (!done) { // JavaScript optimisers like a clear exit though I never use 'done' apart from fooling the optimiser
            last = code;
            code = 0;
            for (i = 0; i < size; i++) {
                if (data[pos >> 3] & (1 << (pos & 7))) { code |= 1 << i }
                pos++;
            }
            if (code === clear) { // clear and reset the dictionary
                dic = [];
                size = minSize + 1;
                for (i = 0; i < clear; i++) { dic[i] = [i] }
                dic[clear] = [];
                dic[eod] = null;
            } else {
                if (code === eod) {  done = true; return }
                if (code >= dic.length) { dic.push(dic[last].concat(dic[last][0])) }
                else if (last !== clear) { dic.push(dic[last].concat(dic[code][0])) }
                d = dic[code];
                len = d.length;
                for (i = 0; i < len; i++) { pixelBuf[pixelPos++] = d[i] }
                if (dic.length === (1 << size) && size < 12) { size++ }
            }
        }
    };
    function parseColourTable(count) { // get a colour table of length count  Each entry is 3 bytes, for RGB.
        var colours = [];
        for (var i = 0; i < count; i++) { colours.push([st.data[st.pos++], st.data[st.pos++], st.data[st.pos++]]) }
        return colours;
    }
    function parse (){        // read the header. This is the starting point of the decode and async calls parseBlock
        var bitField;
        st.pos                += 6;  
        gif.width             = (st.data[st.pos++]) + ((st.data[st.pos++]) << 8);
        gif.height            = (st.data[st.pos++]) + ((st.data[st.pos++]) << 8);
        bitField              = st.data[st.pos++];
        gif.colorRes          = (bitField & 0b1110000) >> 4;
        gif.globalColourCount = 1 << ((bitField & 0b111) + 1);
        gif.bgColourIndex     = st.data[st.pos++];
        st.pos++;                    // ignoring pixel aspect ratio. if not 0, aspectRatio = (pixelAspectRatio + 15) / 64
        if (bitField & 0b10000000) { gif.globalColourTable = parseColourTable(gif.globalColourCount) } // global colour flag
        setTimeout(parseBlock, 0);
    }
    function parseAppExt() { // get application specific data. Netscape added iterations and terminator. Ignoring that
        st.pos += 1;
        if ('NETSCAPE' === st.getString(8)) { st.pos += 8 }  // ignoring this data. iterations (word) and terminator (byte)
        else {
            st.pos += 3;            // 3 bytes of string usually "2.0" when identifier is NETSCAPE
            st.readSubBlocks();     // unknown app extension
        }
    };
    function parseGCExt() { // get GC data
        var bitField;
        st.pos++;
        bitField              = st.data[st.pos++];
        gif.disposalMethod    = (bitField & 0b11100) >> 2;
        gif.transparencyGiven = bitField & 0b1 ? true : false; // ignoring bit two that is marked as  userInput???
        gif.delayTime         = (st.data[st.pos++]) + ((st.data[st.pos++]) << 8);
        gif.transparencyIndex = st.data[st.pos++];
        st.pos++;
    };
    function parseImg() {                           // decodes image data to create the indexed pixel image
        var deinterlace, frame, bitField;
        deinterlace = function (width) {                   // de interlace pixel data if needed
            var lines, fromLine, pass, toline;
            lines = pixelBufSize / width;
            fromLine = 0;
            if (interlacedBufSize !== pixelBufSize) {      // create the buffer if size changed or undefined.
                deinterlaceBuf = new Uint8Array(pixelBufSize);
                interlacedBufSize = pixelBufSize;
            }
            for (pass = 0; pass < 4; pass++) {
                for (toLine = interlaceOffsets[pass]; toLine < lines; toLine += interlaceSteps[pass]) {
                    deinterlaceBuf.set(pixelBuf.subarray(fromLine, fromLine + width), toLine * width);
                    fromLine += width;
                }
            }
        };
        frame                = {}
        gif.frames.push(frame);
        frame.disposalMethod = gif.disposalMethod;
        frame.time           = gif.length;
        frame.delay          = gif.delayTime * 10;
        gif.length          += frame.delay;
        if (gif.transparencyGiven) { frame.transparencyIndex = gif.transparencyIndex }
        else { frame.transparencyIndex = undefined }
        frame.leftPos = (st.data[st.pos++]) + ((st.data[st.pos++]) << 8);
        frame.topPos  = (st.data[st.pos++]) + ((st.data[st.pos++]) << 8);
        frame.width   = (st.data[st.pos++]) + ((st.data[st.pos++]) << 8);
        frame.height  = (st.data[st.pos++]) + ((st.data[st.pos++]) << 8);
        bitField      = st.data[st.pos++];
        frame.localColourTableFlag = bitField & 0b10000000 ? true : false; 
        if (frame.localColourTableFlag) { frame.localColourTable = parseColourTable(1 << ((bitField & 0b111) + 1)) }
        if (pixelBufSize !== frame.width * frame.height) { // create a pixel buffer if not yet created or if current frame size is different from previous
            pixelBuf     = new Uint8Array(frame.width * frame.height);
            pixelBufSize = frame.width * frame.height;
        }
        lzwDecode(st.data[st.pos++], st.readSubBlocksB()); // decode the pixels
        if (bitField & 0b1000000) {                        // de interlace if needed
            frame.interlaced = true;
            deinterlace(frame.width);
        } else { frame.interlaced = false }
        processFrame(frame);                               // convert to canvas image
    };
    function processFrame(frame) { // creates a RGBA canvas image from the indexed pixel data.
        var ct, cData, dat, pixCount, ind, useT, i, pixel, pDat, col, frame, ti;
        frame.image        = document.createElement('canvas');
        frame.image.width  = gif.width;
        frame.image.height = gif.height;
        frame.image.ctx    = frame.image.getContext("2d");
        ct = frame.localColourTableFlag ? frame.localColourTable : gif.globalColourTable;
        if (gif.lastFrame === null) { gif.lastFrame = frame }
        useT = (gif.lastFrame.disposalMethod === 2 || gif.lastFrame.disposalMethod === 3) ? true : false;
        if (!useT) { frame.image.ctx.drawImage(gif.lastFrame.image, 0, 0, gif.width, gif.height) }
        cData = frame.image.ctx.getImageData(frame.leftPos, frame.topPos, frame.width, frame.height);
        ti  = frame.transparencyIndex;
        dat = cData.data;
        if (frame.interlaced) { pDat = deinterlaceBuf }
        else { pDat = pixelBuf }
        pixCount = pDat.length;
        ind = 0;
        for (i = 0; i < pixCount; i++) {
            pixel = pDat[i];
            col   = ct[pixel];
            if (ti !== pixel) {
                dat[ind++] = col[0];
                dat[ind++] = col[1];
                dat[ind++] = col[2];
                dat[ind++] = 255;      // Opaque.
            } else
                if (useT) {
                    dat[ind + 3] = 0; // Transparent.
                    ind += 4;
                } else { ind += 4 }
        }
        frame.image.ctx.putImageData(cData, frame.leftPos, frame.topPos);
        gif.lastFrame = frame;
        if (!gif.waitTillDone && typeof gif.onload === "function") { doOnloadEvent() }// if !waitTillDone the call onload now after first frame is loaded
    };
    // **NOT** for commercial use.
    function finnished() { // called when the load has completed
        gif.loading           = false;
        gif.frameCount        = gif.frames.length;
        gif.lastFrame         = null;
        st                    = undefined;
        gif.complete          = true;
        gif.disposalMethod    = undefined;
        gif.transparencyGiven = undefined;
        gif.delayTime         = undefined;
        gif.transparencyIndex = undefined;
        gif.waitTillDone      = undefined;
        pixelBuf              = undefined; // dereference pixel buffer
        deinterlaceBuf        = undefined; // dereference interlace buff (may or may not be used);
        pixelBufSize          = undefined;
        deinterlaceBuf        = undefined;
        gif.currentFrame      = 0;
        if (gif.frames.length > 0) { gif.image = gif.frames[0].image }
        doOnloadEvent();
        if (typeof gif.onloadall === "function") {
            (gif.onloadall.bind(gif))({   type : 'loadall', path : [gif] });
        }
        if (gif.playOnLoad) { gif.play() }
    }
    function canceled () { // called if the load has been cancelled
        finnished();
        if (typeof gif.cancelCallback === "function") { (gif.cancelCallback.bind(gif))({ type : 'canceled', path : [gif] }) }
    }
    function parseExt() {              // parse extended blocks
        const blockID = st.data[st.pos++];
        if(blockID === GIF_FILE.GCExt) { parseGCExt() }
        else if(blockID === GIF_FILE.COMMENT) { gif.comment += st.readSubBlocks() }
        else if(blockID === GIF_FILE.APPExt) { parseAppExt() }
        else {
            if(blockID === GIF_FILE.UNKNOWN) { st.pos += 13; } // skip unknow block
            st.readSubBlocks();
        }

    }
    function parseBlock() { // parsing the blocks
        if (gif.cancel !== undefined && gif.cancel === true) { canceled(); return }

        const blockId = st.data[st.pos++];
        if(blockId === GIF_FILE.IMAGE ){ // image block
            parseImg();
            if (gif.firstFrameOnly) { finnished(); return }
        }else if(blockId === GIF_FILE.EOF) { finnished(); return }
        else { parseExt() }
        if (typeof gif.onprogress === "function") {
            gif.onprogress({ bytesRead  : st.pos, totalByte
    /** Creates the tiling background */

    var el      =  $('body')[0];
    var src     =  $(el).css('background-image').slice(4, -1);
    var img     =  new GIF();
        img.src =  '<?php echo get_template_directory_uri();?>/img/gif/background.gif';

    repeatBg    =  function(){  
        var canvas = $('canvas')[0];
        var ctx = canvas.getContext("2d");
        canvas.width = img.width;
        canvas.height = img.height *2 ;
        ctx.drawImage(img,0,0);
        ctx.scale(1, -1);
        ctx.translate(0, -img.height);
        ctx.drawImage(img, 0, -img.height, img.width, img.height);
        var dataURL = canvas.toDataURL();
        $(el).css({
            'background-image' : 'url('+dataURL+')',
            'background-repeat' : 'repeat-y'
        });    
        $(window).off('load, scroll, resize', checkHeight);        
    }

    checkHeight =  function(){ 
    
        if(img.height < window.innerHeight){
            repeatBg();     
        }
    }

    img.onload  =  checkHeight();
    $(window).on('load, scroll, resize', checkHeight);
</script>

