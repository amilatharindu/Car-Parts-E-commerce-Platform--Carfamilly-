 
  document.addEventListener("DOMContentLoaded", function () {
    // Create snowflake element
    const snowflakeCount = 50; // Number of snowflakes
    for (let i = 0; i < snowflakeCount; i++) {
      const snowflake = document.createElement("div");
      snowflake.className = "snowflake";
      document.body.appendChild(snowflake);
    }
  });
 
