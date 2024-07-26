## What's Happening - Event Listing and Community Group Website

This repository contains the code for "What's Happening," a web application designed to connect people with local events and community groups. Users can browse and filter events, discover community groups, post their own events, and connect with their local community.

### Features

- **Homepage:** Displays featured events, recent events, and a call to action to explore local communities.
- **Events Page:** Allows users to browse and filter events by category, location, date, and more.
- **Community Groups Page:** Lists community groups with basic information and links to their details.
- **About Page:** Provides information about the platform and its mission.
- **Post Event Page:** Enables registered users to submit new events.
- **Login Page:** Allows users to authenticate with their credentials.
- **Account Creation Page:** Enables users to register for an account and associate with a community group.
- **Search Functionality:** Provides a way to search for events or groups.
- **Contact Form:** Enables users to send messages to the website admins.

### Tech Stack

- **Languages:** PHP, HTML, CSS, JavaScript
- **Frameworks:** Bootstrap
- **Database:** MySQL
- **Libraries:**
    - Swiper: For image carousels/sliders.
    - Bootstrap Icons: For icons.
    - Glightbox: For lightbox image viewing.
    - AOS: For animations on page load.
    - PHP Email Form: For handling contact form submissions.

### Installation

1. **Set up a local web server environment:** You can use tools like XAMPP, WAMP, or MAMP, which bundle Apache, MySQL, and PHP.
2. **Create a MySQL database:**  Create a new database named `whats_happening`.
3. **Import the database schema:**  Download the `whats_happening.sql` file from this repository and import it into your newly created database.
4. **Clone the repository:** Use `git clone [repository URL]` to clone this repository to your local machine.
5. **Configure database credentials:** Update the database credentials in the `serverlogin.php` file to match your local MySQL database settings. 
   - Replace `localhost`, `root`, and `root` with your database host, username, and password, respectively.
6. **Set up file permissions:** Ensure that the web server has write permissions to the `uploads` directory (or any directory where you want to store uploaded images).
7. **Access the website:**  Open a web browser and navigate to `http://localhost/[path/to/your/project/directory]`.

### Running the Project Locally

1. **Start your local web server:** Start the Apache service in your chosen web server environment.
2. **Access the website:** Open a web browser and navigate to the URL you set up during installation (usually `http://localhost/whats_happening`).

### Configuration

- **`serverlogin.php`:**  Update the database connection details as mentioned in the Installation section.

### Testing

1. **Basic Functionality:** Browse the website, test the navigation, search functionality, and event filtering options.
2. **Contact Form:**  Submit messages through the contact form to ensure it's working correctly.
3. **Event Posting:** (If you have set up a user account) Try posting a new event and verify that it's displayed on the events page.
4. **Login and Account Creation:** Test the login and account creation features to ensure proper authentication and registration.

### Contributing

Contributions are welcome! Please follow these guidelines:

1. **Fork the repository:** Create a fork of the repository on your GitHub account.
2. **Create a branch:** Create a new branch for your feature or bug fix.
3. **Commit your changes:** Write clear commit messages describing your changes.
4. **Push to your branch:** Push your changes to your forked repository.
5. **Create a pull request:** Submit a pull request to the main repository, clearly outlining your changes and their purpose.

### License

This project is licensed under the MIT License - see the LICENSE file for details.
