// script.js

document.addEventListener("DOMContentLoaded", function() {
    fetchBlogPosts();
});

function fetchBlogPosts() {
    // URL of your EC2 instance (you can replace it with your ALB URL or EC2 instance directly)
    const apiUrl = "http://blogalb-1832487930.ap-southeast-2.elb.amazonaws.com/index.php";

    fetch(apiUrl)
        .then(response => response.text())
        .then(data => {
            document.getElementById("blog-posts").innerHTML = data;
        })
        .catch(error => {
            console.error("Error fetching blog posts:", error);
            document.getElementById("blog-posts").innerHTML = "<p>Sorry, we couldn't load the blog posts right now.</p>";
        });
}
