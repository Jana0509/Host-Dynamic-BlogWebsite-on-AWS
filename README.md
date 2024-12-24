# Host-Dynamic-BlogWebsite-on-AWS
Host a Scalable, Reliable and Secure Blog Webiste in 3 Tier Architecture on AWS

## Introduction:
This Project demonstrates deployment of Blog website in VPC from scratch and hosting a website Scalable, Reliable, Secure and cost optimized on AWS using various AWS Services. The Static website is deployed in Simple storage service(s3) and the Dynamic portion of the website is deployed in EC2 instances in private subnet and its fronted with the Application Load Balancer for routing the traffic across multiple availability zones and storing the data in RDS(Relational Database Service) also sitting in private subnet. To connect the Private instances, EC2 Instance Connect Endpoint Service for secure SSH access.


## Architecture Overview: 

![image](https://github.com/user-attachments/assets/ccd8e61c-c7ae-4f03-a007-d5970f8d6f40)

# The architecture includes:

- A Custom VPC with two public and private subnets across multiple Availability Zones.
- CloudFront for the Content Delivery Network which is used to cache the Static files at the edge locations.
- S3 Website used for hosting the static website
- NAT Gateway deployed in public subnet acts as a proxy for the private instances to communicate with Internet.
- Application Load Balancer sitting in public subnet receives the traffic from S3 website and its helps to route the traffic to multiple EC2 instances in private subnets.
- EC2 Instances Across different Availbility Zones used to compute the Blog dynamic Website and sitting in the Private Subnets.
- Auto Scaling Groups tied with the EC2 instances for the scalibility if the load increases or decreases.
- RDS MYSQL primary and standby deployed in Private subnets for the storing the data of the website.
- EC2 Instances connect helps to connect with the Private instances and used for SSH into the EC2 instances.
- IAM for the Secured usage across Resources
- ACM (Amazon Certificate Manger) used to store Store TLS/SSL Certificate and this certificates used for encrypting the data in transit.

# Resources Uses:

- VPC : Its the Secure isolated network for the workloads to run
- NAT GATEWAY : Used as a proxy for the private Instances such as EC2 to contact Internet.
- S3 Website : used for hosting the static files such as html,css and js.
- CloudFront : Its the CDN which caches the static content at the edge location across the world and helps to reduce the latency and get the faster response to the end users.
- EC2 : Compute Service used to run the workloads.
- AutoScaling Groups: Provides the Scalibility for the Ec2 Instances.
- RDS : Data store for storing the Relational Data for the website.
- EC2 Instance Connect : used for Securely SSH into private instances.
- IAM : Identity and Access Management for the Resources and users
- ALB : Distributes traffic across EC2 instances in multiple availability zones

# PROCEDURE FOR CREATING THE RESOURCES AND INSTALLATION:

1. Create the Custom VPC with public and private subnets across two availability zones.
   PFA Creation Link : https://github.com/Jana0509/3-Tier-VPC-AWS

![image](https://github.com/user-attachments/assets/79cc2aaa-ca00-4f86-a008-d5cee38e69c5)

2. Create the RDS MYSQL Engine and deploy to the private subnet and create the security group which allow inbound traffic from EC2 Security Group.

   ![image](https://github.com/user-attachments/assets/e8dd3214-cd3e-41f2-a5a2-2a8079183a50)

3.  Create the EC2 Instances in the private Subnet across multiple availability Zones and create the security group which allow inbound traffic from Application Load balancer. Ec2 Instances to connect to the internet for installing the software
    Patches, add the internet traffic destination to NAT Gateway ID. Allow EC2 Instances endpoint SG for SSH into to the private EC2 Instances.

4. Create the Ec2 Instances Endpoint Service and deploy it in private subnets. Tag the Security Group which allows Internet http and https inbound traffic.

5. Install Webserver and MYSQL client in the EC2 Instances. Please Refer EC2 Launch Template file 

![image](https://github.com/user-attachments/assets/c723afab-ad5a-471a-9b42-4b9b04aac349)

6. Host the php application and create the Database and table for the blog website
   PFA index.php file

   ![image](https://github.com/user-attachments/assets/40d6ea15-973f-482d-8a81-99d98ffdeaae)

7. Create and deploy the Application Load balancer and target groups in the public subnet

   ![image](https://github.com/user-attachments/assets/e7b93631-b6dc-4a72-8762-98a301a77a1d)

8.  Create the S3 Bucket and upload the static files such as index.html, style.css and script.js to the bucket and create the Static Website. PFA Files.

   ![image](https://github.com/user-attachments/assets/814c9477-c676-4a3a-bc3b-64a70e4b0803)

9. Create CloudFront Distribution for the S3 Website for the Caching the static web files.

    ![image](https://github.com/user-attachments/assets/e3998f08-4d36-4034-8b94-6a4e423d3982)

10. Change the apiurl to ALB URL in script.js file

11. Browse the Blog Website using Cloudfront Distribution URL.

![image](https://github.com/user-attachments/assets/db252ca1-abe0-4cf5-b3e6-11c950e3b959)

![image](https://github.com/user-attachments/assets/aa7b8314-e6cf-4092-80ca-78d6309f6450)

    
