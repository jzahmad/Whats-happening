## What's Happening - Event Listing and Community Group Website

This repository contains the code for "What's Happening", a website designed to connect people with local events and community groups.

### Features

* **Homepage:** Displays featured events, recent events, and a call to action to explore local communities.
* **Events Page:** Allows users to browse and filter events by category, location, date, and more.
* **Community Groups Page:** Lists community groups with basic information and links to their details.
* **About Page:** Provides information about the platform and its mission.
* **Post Event Page:** Enables registered users to submit new events.
* **Login Page:** Allows users to authenticate with their credentials.
* **Account Creation Page:** Enables users to register for an account and associate with a community group.
* **Search Functionality:** Provides a way to search for events or groups.
* **Contact Form:** Enables users to send messages to the website admins.

### Technologies Used

* **PHP:** Server-side language for handling database interactions, user authentication, and form submissions.
* **MySQL:** Database for storing event information, user accounts, and group data.
* **HTML:** Defines the structure and content of the website's pages.
* **CSS:** Styles the website's visual elements, layout, colors, and fonts.
* **JavaScript:** Adds interactivity and functionality to the website, including:
    * **Dropdown Menus**
    * **Search Functionality**
    * **Smooth Scrolling**
    * **Image Carousels (Swiper library)**
    * **Contact Form Validation and Submission**
    * **Other interactive elements**

### Libraries and Frameworks

* **Swiper:** For creating image carousels/sliders.
* **Bootstrap:** For responsive design, grid system, and UI components.
* **Bootstrap Icons:** For icons.
* **Glightbox:** For lightbox image viewing.
* **AOS:** For animations on page load.

### Folder Structure

```
├── assets
│   └── js
│       ├── main.js
│       └── swiper-bundle.min.js
├── contact.php
├── create-event.php
├── events.php
├── groups.php
├── home.php
├── index.php
├── login.php
├── register.php
└── serverlogin.php
```

### Setup Instructions

1. **Database Setup:**
    * Create a new MySQL database and import the necessary tables from the provided database schema.
    * Update the database credentials in `serverlogin.php`.
2. **Web Server:**
    * Configure a web server (e.g., Apache, Nginx) to serve the files in this repository.
3. **Permissions:**
    * Ensure that the web server has write permissions to the folder where uploaded files are stored (e.g., `uploads` directory).
4. **Access the Website:**
    * Open a web browser and navigate to the URL where the website is hosted.

### Contributing

Contributions are welcome! Please create a pull request with clear explanations and tests for your changes.

### License

This project is licensed under the MIT License.

### Contact

For any questions or feedback, please contact [Your Contact Information].
