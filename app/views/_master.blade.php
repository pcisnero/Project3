<!DOCTYPE html>
<html>
<head>
    
<meta charset="UTF-8">
<title>Lorem Ipsum Generator/Random User Generator</title>
    
    <meta name='viewport' content='width=device-width, initial-scale=1'>
	
	<link href="//maxcdn.bootstrapcdn.com/bootswatch/3.2.0/journal/bootstrap.min.css" rel="stylesheet">
    
   <link rel="stylesheet" href="{{ URL::asset('/') }}css/mystyle.css" />.

    
</head>
    
<body>
    <div id="header">
        <img src=' {{ URL::asset('images/cat2.jpg') }} ' alt='Company Logo'>
        
<h1 id="text">IPSUM GENERATOR & USER GENERATOR </h1>
        
</div>
    
<div class='container'>

    
<blockquote >
	Lorem ipsum is a pseudo-Latin text used in web design, typography, layout, and printing in place of English to emphasise design elements over content. While lorem ipsum's still resembles classical Latin, it actually has no meaning whatsoever.
</blockquote>

<h2 >Lorem Ipsum Generator</h2>
    
<a href='/lorem-ipsum'>Go to the App!</a>
 

<h2>Random User Generator</h2>
    
<p>A free API for generating random user data.
    </p>

<a href='/user-generator'>Go to the App!</a>
    
      
	
</div>

@yield('content')
    
   <img src=' {{ URL::asset('images/cat.jpg') }} ' alt='Company Logo'>
    
</body>

</html>