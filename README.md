
This is a simple example of using Pub Sub using a device server.  The reason for using a ZMQDevice is that it is the only way to allow many publishers to many subscribers.  The reason for this is that there may only be a single socket bind on each port while there can be many connections.  The code to connect the two bound publisher and subscriber sockets is very small but it is required.

This repo provides two examples of normal receiving servers that can be mixed together in any amount.  One first example uses a plain while loop with a small sleep if there are no messages to be read.  The second example requires The React Composer libraries to be installed and it uses a more advanced asynchronous event loop to accomplish the same thing.

## Simple while loop example.

You will need to open up three terminal windows.

1. `./device-server.php`

2. `./receive-server.php`

3. `./send.php` many times to send messages.


## React loop example.

You will need to open up three terminal windows.

1. `./device-server.php`

2. `./react-receive-server.php`

3. `./send.php` many times to send messages.

## Putting it all together

Notice that only step 2) differs between the two examples.  Actually the way that ZMQ works we can run any number of the receiving servers and ZMQ will automatically work.  So try running both the React loop version of step 2) and the simple while loop with delay version.  You can run any number of these receiving servers using any implementation and it will just work.  The point of this then is that the code that sends the message can also be on any client in the network and it will just automatically work without needing to know how many subscribers there are for the channel.  Also this is efficient and scalable.

Here is an example of running both of the different implementations of the receiving server.

![Example](https://github.com/dschissler/zmq_device/raw/master/running_both_servers.png)
