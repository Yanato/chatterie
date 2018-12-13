    function drawGrid(nbrCase, nbrCat, paddingTop, paddingLeft, color, nomEspace) {
      var cnv = document.getElementById("cnv");
      var gridOptions = {
        separation: 50,
        color: color,
        nbrCase: nbrCase,
        paddingTop: paddingTop,
        paddingLeft: paddingLeft,
        nbrCat: nbrCat,
        nomEspace: nomEspace,
      };
      drawGridLines(cnv, gridOptions);
      return;
    }

    function drawGridLines(cnv, lineOptions) {
      var iHeight = 0
      var iWidth = lineOptions.nbrCase * lineOptions.separation;
      iHeight = 50;

      var ctx = cnv.getContext('2d');
      ctx.strokeStyle = lineOptions.color;
      ctx.strokeWidth = 1;
      ctx.beginPath();

      var iCount = null;
      var i = null;
      var x = null;
      var y = null;
      var j = null
      var  k = null;

      iCount = lineOptions.nbrCase;

      if (i <= lineOptions.nbrCat) {
        var logoImg = new Image();




        logoImg.onload = function() {
          var logo = {
            img: logoImg,
          }
          while (j < lineOptions.nbrCat) {
            x = (j * lineOptions.separation);

            ctx.drawImage(logo.img, x + lineOptions.paddingLeft, lineOptions.paddingTop);
            j++;
          }
        }
        var rand = Math.floor(Math.random() * 10);
        logoImg.src = `imgcat${rand}.png`;
        console.log(`imgcat${rand}.png`);
      }

      for (i = 0; i <= iCount; i++) {
        x = (i * lineOptions.separation);
        ctx.moveTo(x + lineOptions.paddingLeft, lineOptions.paddingTop + 0);
        ctx.lineTo(x + lineOptions.paddingLeft, lineOptions.paddingTop + iHeight);
        ctx.stroke();
      }

      iCount = 1;
      for (i = 0; i <= iCount; i++) {
        y = (i * lineOptions.separation);
        ctx.moveTo(lineOptions.paddingLeft, lineOptions.paddingTop + y);
        ctx.lineTo(lineOptions.paddingLeft + iWidth, lineOptions.paddingTop + y);
        ctx.stroke();
      }

      ctx.font = "10px Arial";
      ctx.fillText(lineOptions.nomEspace, lineOptions.paddingLeft, lineOptions.paddingTop - 10);

      ctx.closePath();

      return;
    }
