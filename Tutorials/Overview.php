<?php include_once '../inc/header.php' ?>
<?php include_once '../inc/nav.php' ?>

<h1 class="my-4 text-info text-center display-3">Overview</h1>
<div class="row">
    <div class="col-3">
        <div class="nav flex-column nav-pills card" id="v-pills-tab" role="tablist" aria-orientation="vertical">

            <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home">HTTP</a>

            <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile">Components of HTTP</a>

            <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages">Client: the user-agent</a>

            <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings">The Web server</a>

            <a class="nav-link" data-toggle="pill" href="#Fallback-Routes">Proxies</a>

            <a class="nav-link" data-toggle="pill" href="#Rate-Limiting">Basic aspects of HTTP</a>

            <a class="nav-link" data-toggle="pill" href="#Form-Method-Spoofing">What can be controlled by HTTP</a>

            <a class="nav-link" data-toggle="pill" href="#Accessing-The-Current-Route">HTTP flow</a>

            <a class="nav-link" data-toggle="pill" href="#CORS">HTTP Messages</a>
            <a class="nav-link" data-toggle="pill" href="#APIs">APIs based on HTTP</a>



        </div>
    </div>
    <div class="col-9">
        <div class="tab-content" id="v-pills-tabContent">

            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">

                <p>HTTP is a protocol which allows the fetching of resources, such as HTML documents. It is the foundation of any data exchange on the Web and it is a client-server protocol, which means requests are initiated by the recipient, usually the Web browser. A complete document is reconstructed from the different sub-documents fetched, for instance text, layout description, images, videos, scripts, and more.</p>
                <img src="img/Fetching_a_page.png" width="700" alt="">
                <p>Clients and servers communicate by exchanging individual messages (as opposed to a stream of data). The messages sent by the client, usually a Web browser, are called requests and the messages sent by the server as an answer are called responses.</p>

            </div>



            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                <h4 class="mb-4 py-2 pl-5 pr-2 bg-info d-inline-block">Components of HTTP-based systems</h4>
                <p>HTTP is a client-server protocol: requests are sent by one entity, the user-agent (or a proxy on behalf of it). Most of the time the user-agent is a Web browser, but it can be anything, for example a robot that crawls the Web to populate and maintain a search engine index.</p>
                <p>Each individual request is sent to a server, which handles it and provides an answer, called the response. Between the client and the server there are numerous entities, collectively called proxies, which perform different operations and act as gateways or caches, for example.</p>

                <img src="img/Client-server-chain.png" class="img-fluid">
                <p>In reality, there are more computers between a browser and the server handling the request: there are routers, modems, and more. Thanks to the layered design of the Web, these are hidden in the network and transport layers. HTTP is on top, at the application layer. Although important to diagnose network problems, the underlying layers are mostly irrelevant to the description of HTTP.</p>


            </div>

            <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                <h4 class="mb-4 py-2 pl-5 pr-2 bg-info d-inline-block">Client: the user-agent</h4>
                <p>The user-agent is any tool that acts on the behalf of the user. This role is primarily performed by the Web browser</p>
                <p>The browser is always the entity initiating the request. It is never the server (though some mechanisms have been added over the years to simulate server-initiated messages). </p>
                <p>To present a Web page, the browser sends an original request to fetch the HTML document that represents the page. It then parses this file, making additional requests corresponding to execution scripts, layout information (CSS) to display, and sub-resources contained within the page (usually images and videos). The Web browser then mixes these resources to present to the user a complete document, the Web page. Scripts executed by the browser can fetch more resources in later phases and the browser updates the Web page accordingly.</p>
                <p>A Web page is a hypertext document. This means some parts of displayed text are links which can be activated (usually by a click of the mouse) to fetch a new Web page.</p>
            </div>

            <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                <h4 class="mb-4 py-2 pl-5 pr-2 bg-info d-inline-block">The Web server</h4>

                <p>On the opposite side of the communication channel, is the server, which serves the document as requested by the client</p>
                <p>A server is not necessarily a single machine, but several server software instances can be hosted on the same machine. With HTTP/1.1 and the Host header, they may even share the same IP address.</p>



            </div>

            <div class="tab-pane fade" id="Fallback-Routes">
                <h4 class="mt-5 mb-4 py-2 pl-5 pr-2 bg-info d-inline-block">Proxies</h4>

                <p>Between the Web browser and the server, numerous computers and machines relay the HTTP messages</p>
                <p>most of these operate at the transport, network or physical levels, Those operating at the application layers are generally called proxies</p>
                <p>Proxies may perform numerous functions:</p>
                <ul>
                    <li>caching (the cache can be public or private, like the browser cache)</li>
                    <li>filtering (like an antivirus scan or parental controls)</li>
                    <li>load balancing (to allow multiple servers to serve the different requests)</li>
                    <li>authentication (to control access to different resources)</li>
                    <li>logging (allowing the storage of historical information)</li>

                </ul>
            </div>
            <div class="tab-pane fade" id="Rate-Limiting">
                <h2 class="mt-5 mb-4 py-2 px-2 bg-success d-inline-block">Basic aspects of HTTP</h2>
                <br>

                <h4 class="mb-4 py-2 pl-5 pr-2 bg-info d-inline-block">HTTP is simple</h4>
                <p>nothing</p>

                <h4 class="mb-4 py-2 pl-5 pr-2 bg-info d-inline-block">HTTP is extensible</h4>
                <p>Introduced in HTTP/1.0, HTTP headers make this protocol easy to extend and experiment with. New functionality can even be introduced by a simple agreement between a client and a server about a new header's semantics.</p>

                <h4 class="mb-4 py-2 pl-5 pr-2 bg-info d-inline-block">HTTP is stateless, but not sessionless</h4>
                <p>HTTP is stateless: there is no link between two requests being successively carried out on the same connection. </p>
                <p>HTTP cookies allow the use of stateful sessions. Using header extensibility, HTTP Cookies are added to the workflow, allowing session creation on each HTTP request to share the same context, or the same state.</p>

                <h4 class="mb-4 py-2 pl-5 pr-2 bg-info d-inline-block">HTTP and connections</h4>
                <p>Before a client and server can exchange an HTTP request/response pair, they must establish a TCP connection,</p>


            </div>

            <div class="tab-pane fade" id="Form-Method-Spoofing">
                <h4 class="mt-5 mb-4 py-2 pl-5 pr-2 bg-info d-inline-block">What can be controlled by HTTP</h4>
                <p>Here is a list of common features controllable with HTTP.</p>
                <ul>
                    <li><b><a href="https://developer.mozilla.org/en-US/docs/Web/HTTP/Caching" target="_blank">Caching</a></b> How documents are cached can be controlled by HTTP. The server can instruct proxies and clients, about what to cache and for how long. The client can instruct intermediate cache proxies to ignore the stored document.</li>
                    <li><b>Relaxing the origin constraint</b></li>
                    <li><b>Authentication</b></li>
                    <li><b>Proxy and tunneling</b></li>
                    <li><b>Sessions</b></li>
                </ul>
            </div>

            <div class="tab-pane fade" id="Accessing-The-Current-Route">
                <h4 class="mt-5 mb-4 py-2 pl-5 pr-2 bg-info d-inline-block">HTTP flow</h4>

                <p>When a client wants to communicate with a server, either the final server or an intermediate proxy, it performs the following steps:</p>
                <ol>
                    <li>Open a TCP connection: The TCP connection is used to send a request, or several, and receive an answer. The client may open a new connection, reuse an existing connection, or open several TCP connections to the servers.</li>
                    <li>Send an HTTP message: HTTP messages (before HTTP/2) are human-readable. With HTTP/2, these simple messages are encapsulated in frames, making them impossible to read directly, but the principle remains the same. For example:
                        <pre class="p-3 text-white-50 bg-dark">
GET / HTTP/1.1
Host: developer.mozilla.org
Accept-Language: fr
</pre>
                    </li>
                    <li>Read the response sent by the server, such as:
                        <pre class="p-3 text-white-50 bg-dark">
HTTP/1.1 200 OK
Date: Sat, 09 Oct 2010 14:28:02 GMT
Server: Apache
Last-Modified: Tue, 01 Dec 2009 20:18:22 GMT
ETag: "51142bc1-7449-479b075b2891b"
Accept-Ranges: bytes
Content-Length: 29769
Content-Type: text/html

&lt;!DOCTYPE html... (here comes the 29769 bytes of the requested web page)
</pre>
                    </li>
                    <li>Close or reuse the connection for further requests.</li>
                </ol>
                <p>If HTTP pipelining is activated, several requests can be sent without waiting for the first response to be fully received. HTTP pipelining has proven difficult to implement in existing networks, where old pieces of software coexist with modern versions. HTTP pipelining has been superseded in HTTP/2 with more robust multiplexing requests within a frame.</p>
            </div>

            <div class="tab-pane fade" id="CORS">
                <h4 class="mt-5 mb-4 py-2 pl-5 pr-2 bg-info d-inline-block">HTTP Messages</h4>
                <p>There are two types of HTTP messages, requests and responses, each with its own format.</p>

                <h6 class="mt-6 mb-4 py-1 pl-5 pr-2 bg-success d-inline-block">Requests</h6>

                <h6 class="mt-6 mb-4 py-1 pl-5 pr-2 bg-success d-inline-block">HTTP Messages</h6>
                <img src="img/HTTP_Request.png" alt="">
                <p>Requests consists of the following elements:</p>
                <ul>
                    <li>An HTTP method, usually a verb like GET, POST or a noun like OPTIONS or HEAD that defines the operation the client wants to perform. Typically, a client wants to fetch a resource (using GET) or post the value of an HTML form (using POST), though more operations may be needed in other cases.</li>
                    <li>The path of the resource to fetch; the URL of the resource stripped from elements that are obvious from the context, for example without the protocol (http://), the domain (here, developer.mozilla.org), or the TCP port (here, 80).</li>
                    <li>The version of the HTTP protocol.</li>
                    <li>Optional headers that convey additional information for the servers.</li>
                    <li>Or a body, for some methods like POST, similar to those in responses, which contain the resource sent.</li>
                </ul>

                <h6 class="mt-6 mb-4 py-1 pl-5 pr-2 bg-success d-inline-block">Responses</h6>
                <img src="img/HTTP_Response.png" alt="">
                <p>Responses consist of the following elements:</p>
                <ul>
                    <li>Responses consist of the following elements:</li>
                    <li>A status code, indicating if the request was successful, or not, and why.</li>
                    <li>A status message, a non-authoritative short description of the status code.</li>
                    <li>HTTP headers, like those for requests.</li>
                    <li>Optionally, a body containing the fetched resource.</li>
                </ul>
            </div>

            <div class="tab-pane fade" id="APIs">
                <h4 class="mt-5 mb-4 py-2 pl-5 pr-2 bg-info d-inline-block">APIs based on HTTP</h4>
                <p>The most commonly used API based on HTTP is the <a href="https://developer.mozilla.org/en-US/docs/Web/API/XMLHttpRequest" target="_blank">XMLHttpRequest</a> API, which can be used to exchange data between a user agent and a server. The modern <a href="https://developer.mozilla.org/en-US/docs/Web/API/Fetch_API" target="_blank">Fetch API</a> provides the same features with a more powerful and flexible feature set.</p>

                <p>Another API, <a href="https://developer.mozilla.org/en-US/docs/Web/API/Server-sent_events" target="_blank">server-sent</a> events, is a one-way service that allows a server to send events to the client, using HTTP as a transport mechanism. Using the <a href="https://developer.mozilla.org/en-US/docs/Web/API/EventSource" target="_blank">EventSource</a> interface, the client opens a connection and establishes event handlers. The client browser automatically converts the messages that arrive on the HTTP stream into appropriate <a href="https://developer.mozilla.org/en-US/docs/Web/API/Event" target="_blank">Event</a> objects, delivering them to the event handlers that have been registered for the events' <a href="https://developer.mozilla.org/en-US/docs/Web/API/Event/type" target="_blank">type</a>a> if known, or to the <a href="https://developer.mozilla.org/en-US/docs/Web/API/EventSource/onmessage" target="_blank">onmessage</a>a> event handler if no type-specific event handler was established.</p>
            </div>



        </div>
    </div>
</div>




<?php include_once '../inc/footer.php' ?>
