/**
 * Mouse Gradient
 * ==============
 * Author : Remy Sharp
 * URL    : https://github.com/remy/html5demos/blob/master/canvas-grad.html
 */

var canvas = document.getElementById('js-animation'),
    ctx = null,
    grad = null,
    body = document.getElementsByTagName('body')[0],
    color = 255;
    
if (canvas.getContext('2d')) {
  ctx = canvas.getContext('2d');
  ctx.clearRect(0, 0, 600, 600);
  ctx.save();
  // Create radial gradient
  grad = ctx.createRadialGradient(0,0,0,0,0,600); 
  grad.addColorStop(0, '#000');
  grad.addColorStop(1, 'rgb(' + color + ', ' + color + ', ' + color + ')');
  // assign gradients to fill
  ctx.fillStyle = grad;
  // draw 600x600 fill
  ctx.fillRect(0,0,600,600);
  ctx.save();
  
  body.onmousemove = function (event) {
    var width = window.innerWidth, 
        height = window.innerHeight, 
        x = event.clientX, 
        y = event.clientY,
        rx = 600 * x / width,
        ry = 600 * y / height;
        
    var xc = ~~(256 * x / width);
    var yc = ~~(256 * y / height);
    grad = ctx.createRadialGradient(rx, ry, 0, rx, ry, 600); 
    grad.addColorStop(0, '#000');
    grad.addColorStop(1, ['rgb(', xc, ', ', (255 - xc), ', ', yc, ')'].join(''));
    // ctx.restore();
    ctx.fillStyle = grad;
    ctx.fillRect(0,0,600,600);
    // ctx.save();
  };
}