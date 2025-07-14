<section class="py-5" id="contact">
  <div class="container">
    <div class="text-center mb-4">
      <h1 class="text-primary">Contact Us</h1>
      <p class="text-muted">We'd love to hear from you!</p>
    </div>
    <form class="row g-3 shadow p-4 bg-white rounded" method="post" action="contact_submit.php">
      <div class="col-md-6">
        <label for="name" class="form-label">Full Name</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Your Name" required />
      </div>
      <div class="col-md-6">
        <label for="email" class="form-label">Email Address</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="you@example.com" required />
      </div>
      <div class="col-md-6">
        <label for="phone" class="form-label">Phone Number</label>
        <input type="tel" class="form-control" id="phone" name="phone" placeholder="+123456789" required />
      </div>
      <div class="col-md-6">
        <label for="subject" class="form-label">Subject</label>
        <input type="text" class="form-control" id="subject" name="subject" placeholder="Reason for contact" required />
      </div>
      <div class="col-12">
        <label for="message" class="form-label">Message</label>
        <textarea class="form-control" id="message" name="message" rows="5" placeholder="Write your message here..." required></textarea>
      </div>
      <div class="col-12 text-end">
        <button type="submit" class="btn btn-primary px-4">Send Message</button>
      </div>
    </form>
  </div>
</section>
