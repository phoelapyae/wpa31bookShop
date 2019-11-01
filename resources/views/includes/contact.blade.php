<section class="bg-cyan py-5" id="contact">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <h3 class="text-center">Contact Us</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio, itaque?
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio, itaque?
                    </p>
                    <img src="images/bg_image7.jpeg" class="contact-bg" alt="">
                </div>
                <div class="col-6">
                    <form action="{{route('newFeedback.store')}}" method="POST">
                    @csrf
                        <div class="form-group">
                            <label for="name">Full Name:</label>
                            <input type="text" name="fullname" id="" class="form-control" placeholder="Enter your fullname">
                        </div>
                        <div class="form-goup">
                            <label for="email">Email:</label>
                            <input type="email" name="email" id="" class="form-control" placeholder="Enter your email address">
                        </div>
                        <div class="form-group">
                            <label for="comment">Comment:</label>
                            <textarea name="comment" id="" cols="30" rows="3" class="form-control" placeholder="Enter your comment"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Comment</button>
                    </form>
                </div>
            </div>
        </div>
    </section>