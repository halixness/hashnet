class Stone {
  constructor(index, value) {
    this.index = index;
    this.value = value;
  }
}

// Dumping current block index 
$.get( "block_index.php", function( data ) {

    // Setting Block Index
    var obj = JSON.parse(data);

    var m, n, b, v, c, x, z, l, k, j;
    var indexes = [obj.z, obj.x, obj.c, obj.v, obj.b, obj.n, obj.m, obj.l, obj.k, obj.h];
    var chars = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ!\"#$%&'()*+,-.:;<=>?@[\]^_`{|}~0123456789";
    var CHARS = 90;

    // Generating dictionary from dumped index
    for(m = indexes[0] % CHARS; m < CHARS; m++)
        for(n = indexes[1] % CHARS; n < CHARS; n++)
            for(b = indexes[2] % CHARS; b < CHARS; b++)
                for(v = indexes[3] % CHARS; v < CHARS; v++)
                    for(c = indexes[4] % CHARS; c < CHARS; c++)
                        for(x = indexes[5] % CHARS; x < CHARS; x++)
                            for(z = indexes[6] % CHARS; z < CHARS; z++)
                                for(l = indexes[7] % CHARS; l < CHARS; l++)
                                    for(k = indexes[8] % CHARS; k < CHARS; k++)
                                        for(j = indexes[9] % CHARS; j < CHARS; j++){

                                            // Uploading generated word
                                            str = chars[m] + " " + chars[n] + " " + chars[b] + " " + chars[v] + " " + chars[c] + " " + chars[x] + " " + chars[z] + " " + chars[l] + " " + chars[k] + " " + chars[j];

                                            var stone = new Stone([m,n,b,v,c,x,z,l,k,j], str);

                                            $.ajax({  
                                                type: 'POST',  
                                                url: 'block_updt.php', 
                                                data: { stone: JSON.stringify(stone) },
                                                success: function(response) {
                                                    alert(response);
                                                },
                                            });
                                        }
});