<div>
    <ul>
        <li><a href="/">Home Page</a></li>
        <li><a href="/hello">Hello Page</a></li>
        <li><a href="{{URL::to('/contact')}}">Contact Page</a></li>
    </ul>
    <h2>Component Title : {{$title}}</h2>
    <h4>Last URL : {{URL::previous()}}</h4>
    <h4>Current URL : {{URL::current()}}</h4>
    <h4>Full URL : {{URL::full()}}</h4>
    
    
    
    <!-- I have not failed. I've just found 10,000 ways that won't work. - Thomas Edison -->
</div>