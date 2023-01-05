import subprocess

# Set up the PHP command to execute
php_command = 'php -r "echo $var1, $var2;"'

# Set the PHP environment variables
php_env = { "var1": "hello", "var2": "world" }

# Execute the PHP command
php_process = subprocess.Popen(php_command, stdout=subprocess.PIPE, env=php_env, shell=True)

# Capture the output of the PHP script
output, _ = php_process.communicate()

# Convert the output to a string and strip the newline character
output_str = output.decode().strip()

# Split the output string into a list
php_vars = output_str.split(",")

# Print the PHP variables
print(php_vars)
