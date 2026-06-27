# ☁️ ScholarHub – Cloud-Based Scholarship Management Portal

A complete cloud-based Scholarship Management Portal developed using **PHP & MySQL** and deployed on **Amazon Web Services (AWS)**. The project demonstrates real-world cloud deployment, infrastructure management, monitoring, storage, and database integration.

---

## 🌐 Live Deployment

**AWS EC2 Hosted Application**

http://YOUR-EC2-PUBLIC-IP/

> Hosted on Amazon EC2 with Apache Web Server

---

# 📖 Project Overview

ScholarHub is a cloud-native web application that allows students to register, log in, browse scholarships, upload supporting documents, and apply online. Administrators can manage scholarships, review applications, and monitor the entire system.

The primary objective of this project is to demonstrate deployment of a web application using multiple AWS cloud services while implementing security, monitoring, storage, and infrastructure best practices.

---

# 🚀 AWS Cloud Services Used

✅ Amazon EC2 (Web Server)

✅ Amazon RDS MySQL (Database)

✅ Amazon S3 (Document Storage)

✅ Amazon CloudFront CDN

✅ Amazon CloudWatch Monitoring

✅ AWS Budgets

✅ Amazon VPC

✅ Security Groups

✅ Terraform (Infrastructure as Code)

---

# 🏗️ Cloud Architecture

The application is deployed completely on AWS infrastructure.

Student/Admin
↓

Browser
↓

Amazon EC2

(Apache + PHP)

↓

Amazon RDS (MySQL)

↓

Amazon S3

↓

CloudFront CDN

↓

CloudWatch Monitoring

↓

AWS Budgets

---

# ✨ Features

### Student

- User Registration
- Secure Login
- Dashboard
- View Scholarships
- Apply for Scholarships
- Upload Supporting Documents
- View Submitted Applications
- Profile Management

---

### Administrator

- Admin Login
- Dashboard
- Add Scholarships
- Edit Scholarships
- Delete Scholarships
- View Registered Students
- Review Applications
- Approve Applications
- Reject Applications

---

# ☁️ AWS Implementation

## Amazon EC2

- Hosted PHP Application
- Apache HTTP Server
- Public IP Deployment
- SSH Remote Access
- Linux Environment

---

## Amazon RDS

- MySQL Database
- Connected with EC2
- Private Database Server
- Automated Backup Enabled

---

## Amazon S3

- Bucket Created
- Versioning Enabled
- Cloud Storage for Documents

---

## Amazon CloudFront

- Global Content Delivery Network
- Faster Content Delivery
- Reduced Latency
- Secure Distribution

---

## Amazon CloudWatch

Configured monitoring for:

- CPU Utilization
- Network Traffic
- Instance Health
- Status Checks

Created:

- Monitoring Dashboard
- CPU Alarm

---

## AWS Budgets

Configured monthly budget monitoring.

Features:

- Budget Alerts
- Cost Monitoring
- Free Tier Tracking

---

## Networking

- Amazon VPC
- Public Subnet
- Internet Gateway
- Route Tables
- Security Groups

---

## Terraform

Infrastructure as Code implemented for AWS resource provisioning.

Terraform configuration included for reproducible cloud deployment.

---

# 🔒 Security Features

- Password Hashing
- Session Authentication
- Role-Based Access Control
- Security Groups
- Restricted RDS Access
- Private Database Credentials
- Secure Cloud Infrastructure

---

# 💻 Technology Stack

### Frontend

- HTML5
- CSS3
- JavaScript

### Backend

- PHP

### Database

- MySQL

### Cloud

- AWS EC2
- AWS RDS
- AWS S3
- CloudFront
- CloudWatch
- AWS Budgets
- VPC
- Terraform

---

# 📂 Project Structure

```
admin/
student/
includes/
screenshots/
terraform/

index.php
login.php
register.php
logout.php
README.md
```

---

# 📸 Project Screenshots

## Application

- Homepage
- Registration Page
- Login Page
- Student Dashboard
- Admin Dashboard
- Scholarship Management
- Application Page
- My Applications

---

## AWS Deployment

- EC2 Instance
- Apache Server
- SSH Connection
- Amazon RDS
- Database Connection
- Amazon S3 Bucket
- CloudFront Distribution
- CloudWatch Dashboard
- CloudWatch Alarm
- AWS Budget
- Terraform Configuration

---

# 📊 Cloud Deployment Workflow

1. Developed application locally using XAMPP.
2. Created AWS VPC and configured networking.
3. Launched Amazon EC2 instance.
4. Installed Apache, PHP, and MySQL client.
5. Migrated application files to EC2.
6. Created Amazon RDS MySQL database.
7. Connected EC2 with RDS.
8. Configured Security Groups.
9. Verified database connectivity.
10. Created Amazon S3 bucket.
11. Enabled bucket versioning.
12. Configured CloudFront CDN.
13. Configured CloudWatch dashboard and alarms.
14. Configured AWS Budget monitoring.
15. Added Terraform configuration for Infrastructure as Code.

---

# 📈 Future Improvements

- AWS Cognito Authentication
- GitHub Actions CI/CD
- AWS Lambda
- Application Load Balancer
- Auto Scaling Group
- S3 Pre-signed URLs
- Custom Domain with HTTPS
- ECS Fargate Deployment

---

# 📚 References

- https://aws.amazon.com/ec2/
- https://aws.amazon.com/rds/
- https://aws.amazon.com/s3/
- https://aws.amazon.com/cloudfront/
- https://aws.amazon.com/cloudwatch/
- https://aws.amazon.com/budgets/
- https://developer.hashicorp.com/terraform
- https://www.php.net/
- https://dev.mysql.com/doc/

---

# 👨‍💻 Author

**Mubashir Azeem Abbasi**

BS Computer Science

Cloud Computing Project

AWS | PHP | MySQL | Terraform
