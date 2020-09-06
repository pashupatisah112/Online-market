@extends('layouts.main')

@section('body')
<div class="container contact-form">
    <h2 class="text-center">Contact Us</h2>
    <div class="contact-image">
        <img src="https://image.ibb.co/kUagtU/rocket_contact.png" style="width:12rem;height:auto;" alt="rocket_contact"/>
    </div>
        <h4>Drop Us a Message</h4>
       <div class="row">
           <form action="{{route('mail.send')}}" method="POST">
            @csrf
            <div class="col-md-6">
                <div class="form-group">
                    <input type="text" name="txtName" class="form-control" placeholder="Your Name *" value="{{old('txtName')}}" required/>
                </div>
                <div class="form-group">
                    <input type="text" name="txtEmail" class="form-control" placeholder="Your Email *" value="{{old('txtEmail')}}" required/>
                </div>
                <div class="form-group">
                    <input type="text" name="txtSubject" class="form-control" placeholder="Subject *" value="{{old('txtSubject')}}" />
                </div>
                <div class="form-group">
                    <input type="submit" name="btnSubmit" class="btn btn-primary" value="Send Message" />
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <textarea name="txtMsg" class="form-control" placeholder="Your Message *" style="width: 100%; height: 150px;" value={{old('txtMsg')}} required></textarea>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection