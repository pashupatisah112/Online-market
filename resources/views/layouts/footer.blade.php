<footer id="footer" style="margin-top:5px;">
    <div class="footer-widget">
        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>{{__('words.service')}}</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="{{route('developer.page')}}">{{__('words.developer_info')}}</a></li>
                            <li><a href="{{route('contact.page')}}">{{__('words.contact')}}</a></li>
                            <li><a href="{{route('faq.page')}}">{{__('words.faq')}}</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>{{__('words.quick_shop')}}</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="{{route('quick.electronics')}}">{{__('words.electronics')}}</a></li>
                            <li><a href="{{route('quick.car.rental')}}">{{__('words.car_rental')}}</a></li>
                            <li><a href="{{route('quick.student.rooms')}}">{{__('words.student_rooms')}}</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>Policies</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="{{route('terms.page')}}">{{__('words.terms')}}</a></li>
                            <li><a href="{{route('policy.page')}}">{{__('words.policies')}}</a></li>
                            <li><a href="{{route('user.advertise')}}">{{__('words.advertise')}}</a></li>
                        </ul>
                    </div>
                </div>
    
                <div class="col-sm-5">
                    <div class="single-widget">
                        <h2>{{__('words.about')}}</h2>
                        <form action="{{route('mail.send')}}" method="POST" class="searchform">
                            @csrf
                            <input type="email" name="mail" required placeholder="{{__('words.your_email')}}" style="width:80%"/>
                            <button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
                            <p>{{__('words.recentNews_quote')}}</p>
                        </form>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <p class="pull-left">Copyright © 2020 HAATNEPAL Inc. All rights reserved.</p>
                <p class="pull-right">Developed by <span><a target="_blank" href="{{route('developer.page')}}">Pashupati Sah</a></span></p>
            </div>
        </div>
    </div>
    
</footer>