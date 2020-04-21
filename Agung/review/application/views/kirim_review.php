
 <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
 
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<body>

    <style>
body {
    font-family: 'Lucida Grande', 'Helvetica Neue', sans-serif;
    font-size: 13px;
}

#comment_form input, #comment_form textarea {
    border: 2px solid rgba(0,0,0,0.1);
    padding: 8px 10px;
    outline: 0;
}
#comment_form input {
    width: 250px;
}
#comment_form textarea {
    width: 450px;
}

#comment_form input[type="submit"] {
    cursor: pointer;
    background: -webkit-linear-gradient(top, #efefef, #ddd);
    background: -moz-linear-gradient(top, #efefef, #ddd);
    background: -ms-linear-gradient(top, #efefef, #ddd);
    background: -o-linear-gradient(top, #efefef, #ddd);
    background: linear-gradient(top, #efefef, #ddd);
    color: #333;
    text-shadow: 0px 1px 1px rgba(255,255,255,1);
    border: 1px solid #ccc;
}

#comment_form input[type="submit"]:hover {
    background: -webkit-linear-gradient(top, #eee, #ccc);
    background: -moz-linear-gradient(top, #eee, #ccc);
    background: -ms-linear-gradient(top, #eee, #ccc);
    background: -o-linear-gradient(top, #eee, #ccc);
    background: linear-gradient(top, #eee, #ccc);
    border: 1px solid #bbb;
}

#comment_form input[type="submit"]:active {
    background: -webkit-linear-gradient(top, #ddd, #aaa);
    background: -moz-linear-gradient(top, #ddd, #aaa);
    background: -ms-linear-gradient(top, #ddd, #aaa);
    background: -o-linear-gradient(top, #ddd, #aaa);
    background: linear-gradient(top, #ddd, #aaa);    
    border: 1px solid #999;
}

#comment_form div {
    margin-bottom: 8px;
}
</style>

<h2>Kolom Review:</h2>
<div id="comment_form">
 
    <form method="POST" action="<?php echo site_url('review/kirimReview') ?>">
        <div >
            <input class="w3-input w3-border" type="text" placeholder="Nama" name="nama">
        </div>
           
        <div>
        <input type='hidden' name='rating' id='rating' value='subid'>
        <span  onmouseover="starmark(this)" onclick="starmark(this)" id="1one" style="font-size:20px;cursor:pointer;"  class="fa fa-star checked"></span>
	<span onmouseover="starmark(this)" onclick="starmark(this)" id="2one"  style="font-size:20px;cursor:pointer;" class="fa fa-star "></span>
	<span onmouseover="starmark(this)" onclick="starmark(this)" id="3one"  style="font-size:20px;cursor:pointer;" class="fa fa-star "></span>
	<span onmouseover="starmark(this)" onclick="starmark(this)" id="4one"  style="font-size:20px;cursor:pointer;" class="fa fa-star"></span>
	<span onmouseover="starmark(this)" onclick="starmark(this)" id="5one"  style="font-size:20px;cursor:pointer;" class="fa fa-star"></span>
	<br/>
	<br/>
            <textarea name="review"></textarea>
        </div>
        <button class="w3-button w3-block w3-teal w3-section w3-padding" type="submit">Kirim Komentar</button>
        </div>
    </form>
</div>
</div>
</body>
<script>
var count;

function starmark(item)
{
count=item.id[0];
sessionStorage.starRating = count;
var subid= item.id.substring(1);
for(var i=0;i<5;i++)
{
if(i<count)
{
document.getElementById((i+1)+subid).style.color="yellow";
}
else
{
document.getElementById((i+1)+subid).style.color="blue";
}

}

}

</script>

</body>

</html>