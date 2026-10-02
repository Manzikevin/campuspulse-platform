# CampusPulse

## The Digital Heartbeat of University Communication

CampusPulse is a modern digital university communication and information management platform designed to replace traditional physical notice boards and fragmented communication channels with a centralized, searchable, and intelligent campus information system.

The platform enables universities to create, manage, publish, and distribute important announcements, academic updates, events, documents, and emergency information to students, staff, and other university stakeholders.

---

# AI Context Guide

> This section provides project context for AI assistants working on CampusPulse.

When assisting with this project, understand that CampusPulse is not just a notice board CRUD application. It is designed as a scalable university communication ecosystem.

The main goal is:

**"Improve how universities communicate, manage information, and engage with their communities through a reliable digital platform."**

AI assistants should prioritize:

- Clean architecture
- Maintainable Laravel practices
- Scalable database design
- Security best practices
- Good user experience
- Real-world university workflows
- Professional software engineering standards

Avoid suggesting solutions that are only suitable for small demos.

---

# Project Vision

Universities often rely on:

- Physical notice boards
- WhatsApp groups
- Emails
- Social media pages
- Department communication channels

This creates problems:

- Students miss important information
- Information becomes outdated
- Announcements are difficult to search
- No centralized history exists
- Communication is not targeted
- There is no engagement tracking

CampusPulse provides one trusted platform where university information can be managed and accessed efficiently.

---

# Core Objectives

## 1. Centralized Communication

Provide one platform where students and staff can access official university information.

---

## 2. Targeted Information Distribution

Allow administrators to publish information to specific audiences.

Examples:

- Specific faculties
- Departments
- Programs
- Academic years
- Student groups

---

## 3. Better Information Management

Provide:

- Searchable announcements
- Categorization
- Attachments
- Expiration dates
- Publishing workflows
- History tracking

---

## 4. Improved Student Experience

Students should easily:

- Discover announcements
- Search information
- Receive important updates
- Bookmark useful notices
- Access documents

---

# Target Users

## Super Administrator

Responsible for:

- System configuration
- User management
- Roles and permissions
- University settings
- Audit monitoring


---

## Notice Administrator

Examples:

- Registrar office
- Academic office
- Student affairs office

Responsibilities:

- Create announcements
- Publish notices
- Manage categories
- View engagement


---

## Department Staff

Examples:

- Lecturers
- Department coordinators

Responsibilities:

- Submit announcements
- Share academic updates
- Manage department information


---

## Students

Students can:

- View notices
- Search information
- Filter announcements
- Download attachments
- Receive notifications
- Bookmark important updates


---

# Main Features

## Authentication & Authorization

The system should support:

- Secure authentication
- Role-based access control
- Permission management
- User profiles

Suggested implementation:

- Laravel Authentication
- Laravel Policies
- Gates
- Spatie Laravel Permission (optional)

---

# Notice Management

The core module.

A notice contains:


Title

Description

Category

Author

Department

Audience

Priority

Status

Published Date

Expiration Date

Attachments

Example:


Title:

Final Examination Timetable Released
Category:

Academic
Audience:

Software Engineering Year 3 Students
Priority:

High
Status:

Published

---

# Notice Categories

Default categories:

## Academic

Examples:

- Exam timetable
- Registration
- Results
- Assignments
- Academic deadlines


## Administration

Examples:

- Fees
- Policies
- Documents
- Regulations


## Events

Examples:

- Workshops
- Hackathons
- Conferences
- Seminars


## Careers

Examples:

- Internships
- Scholarships
- Job opportunities


## Emergency

Examples:

- Campus closure
- Security updates
- Urgent announcements

---

# Audience Targeting

Not every notice should be visible to everyone.

The system should support targeted publishing.

Example:


Notice:
Database Systems Assignment Deadline
Visible To:
Faculty:

Computing
Program:

Software Engineering
Year:

3
Semester:

1

Possible targeting structure:


University

└── Faculty

└── Department

└── Program

└── Students

---

# Publishing Workflow

Professional workflow:


Draft
↓
Submitted
↓
Pending Approval
↓
Approved
↓
Published
↓
Archived

Example:

A lecturer creates a notice.

Department head approves it.

Students receive it.

---

# Notification System

CampusPulse should support multiple notification methods.

## In-App Notifications

Example:


New Announcement
Exam registration opens tomorrow.

---

## Email Notifications

Possible technologies:

- Laravel Mail
- SMTP
- Resend

---

## Real-Time Notifications

Possible technologies:

- Laravel Reverb
- WebSockets
- Pusher

Example:

Emergency notice published.

Students receive it instantly.

---

# Document Management

Notices may include:

- PDF files
- Images
- Documents
- Academic resources

Storage options:

Development:


Local Storage

Production:


Cloudflare R2

AWS S3

---

# Analytics Module

Future feature.

Track:

- Most viewed notices
- Student engagement
- Popular categories
- Department activity
- Notification delivery


Example:


Monthly Statistics
Academic Notices:

120
Event Notices:

45
Total Views:

15,400

---

# AI Features (Future)

Possible AI integrations:

## Smart Notice Assistant

AI can help administrators:

- Generate titles
- Suggest categories
- Improve descriptions
- Detect missing information


Example:

Input:


Students should submit their projects before Friday.

AI suggestion:


Title:

Final Year Project Submission Deadline
Category:

Academic
Priority:

Medium

---

## Smart Search

Future implementation:

- Laravel Scout
- Meilisearch
- AI semantic search


---

# Recommended Technology Stack

## Backend


Laravel 13+

PHP 8.3+

MySQL/PostgreSQL

Laravel Sanctum

Laravel Notifications

Laravel Queues

Laravel Reverb

---

## Frontend

Recommended:


Laravel Blade

Livewire

Alpine.js

Tailwind CSS

Reason:

- Fast development
- Excellent for dashboards
- Less complexity
- Strong Laravel integration

---

# Development Philosophy

Follow:

## Build simple first

Start with:

- Authentication
- Roles
- Notice CRUD
- Categories
- Search

Then expand.

---

## Avoid overengineering

Do not introduce:

- Microservices
- Complex architecture
- Unnecessary dependencies

unless required.

---

# Database Design Concept

Main tables:


users
roles
permissions
faculties
departments
programs
student_profiles
notices
notice_categories
notice_attachments
notice_views
notice_bookmarks
notifications
audit_logs

---

# Suggested Development Roadmap

## Phase 1 - Foundation

Features:

- Laravel setup
- Authentication
- Roles
- Database structure


---

## Phase 2 - Notice System

Features:

- Create notices
- Edit notices
- Delete notices
- Categories
- Attachments


---

## Phase 3 - Student Platform

Features:

- Student dashboard
- Search
- Filters
- Bookmarks


---

## Phase 4 - Communication

Features:

- Notifications
- Email
- Real-time updates


---

## Phase 5 - Intelligence

Features:

- Analytics
- AI assistant
- Smart search


---

# Coding Standards

## Laravel

Follow:

- MVC principles
- Service classes for business logic
- Form Requests for validation
- Policies for authorization
- Clean migrations
- Meaningful naming


---

## Database

Rules:

- Use foreign keys
- Add indexes where needed
- Avoid duplicated data
- Use migrations instead of manual changes


---

## UI Principles

The design should be:

- Modern
- Accessible
- Responsive
- Professional
- University-focused

Avoid:

- Generic templates
- Excessive animations
- Unnecessary complexity


---

# Project Status

Current stage:

Planning and architecture design.

Future development will progressively implement:

- Backend
- Database
- User interfaces
- Notifications
- Advanced features


---

# Contribution Guidelines

Before contributing:

1. Understand the product vision.
2. Follow existing architecture.
3. Keep code readable.
4. Test changes.
5. Avoid breaking existing functionality.


---

# License

To be determined.

---

# Project Summary

CampusPulse is a scalable university communication platform that transforms traditional notice boards into a modern digital information ecosystem.

The platform focuses on:

- Accessibility
- Transparency
- Efficient communication
- Better student engagement
- Reliable university information management


# Final Stack

1. Laravel 13+
2. PHP 8.3+
3. Livewire 3
4. Alpine.js
5. Tailwind CSS v4
6. MySQL
7. Spatie Permission
8. Laravel Reverb
9. Laravel Notifications
10. Laravel Scout
11. Filament (optional)

