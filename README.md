# Ticket Website Project Plan

This project aims to create a simple ticket website where users can log in, submit ticket inquiries, view ticket statuses, and manage different ticket types. The website will be developed within a two-week timeframe and will utilize Apache for hosting. It will be deployed on a Hyper-V Ubuntu system virtual machine.

## Features

1. **User Authentication**: Users can register, log in, and log out securely.

2. **Ticket Submission**: Authenticated users can submit ticket inquiries specifying ticket type and details.

3. **Ticket Status Tracking**: Users can view the status of their submitted tickets.

4. **Different Ticket Types**: Support for multiple ticket types to categorize inquiries.

5. **Database Integration**: Utilize a database with two tables to store user information and ticket details.

## Database Schema

### Users Table
- **id**: Primary key, auto-incrementing integer.
- **username**: User's username.
- **email**: User's email address.
- **password**: User's hashed password.

### Tickets Table
- **id**: Primary key, auto-incrementing integer.
- **user_id**: Foreign key referencing the `id` column in the Users table.
- **ticket_number**: Unique identifier for each ticket.
- **ticket_status**: Current status of the ticket (e.g., open, in progress, resolved).
- **user_email**: Email address of the ticket submitter.
- **user_username**: Username of the ticket submitter.
- **ticket_type**: Type/category of the ticket inquiry.

## Technologies and Tools

- **Frontend**: HTML, CSS, JavaScript
- **Backend**: PHP
- **Database**: MySQL or MariaDB
- **Server**: Apache
- **Development Environment**: Hyper-V Ubuntu virtual machine

## Milestones

### Week 1: Setup and Backend Development
- **Day 1-2**: Setup Ubuntu virtual machine and install Apache, MySQL/MariaDB, PHP.
- **Day 3-4**: Design and implement database schema.
- **Day 5-6**: Develop backend functionalities for user authentication and ticket submission.

### Week 2: Frontend and Integration
- **Day 7-9**: Design and develop frontend interfaces for user registration, login, ticket submission, and ticket status tracking.
- **Day 10**: Integrate frontend with backend functionalities.
- **Day 11-12**: Perform testing, debugging, and optimization.
- **Day 13-14**: Deployment and finalization.

## Deployment

- **Hosting**: Apache will serve the website.
- **Server**: Deployed on a Hyper-V Ubuntu system virtual machine.
- **Domain**: Assign a domain name for easy access.

## Conclusion

This project plan outlines the development of a ticket website with essential features like user authentication, ticket submission, status tracking, and database integration. By following this plan, the website can be developed within a two-week timeframe and hosted on an Apache server running on a Hyper-V Ubuntu system virtual machine.