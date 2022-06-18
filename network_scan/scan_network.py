# -*- coding: utf-8 -*-

from pyvis.network import Network
import networkx as nx
import scapy.all as scapy
import socket
import subprocess

#retrieve the ip of our gateway
p = subprocess.Popen("ipconfig", shell=True, stdout=subprocess.PIPE, stderr=subprocess.PIPE).communicate()[0]
ips_infos = p.split()
router_ip = str(ips_infos[-1])
router_ip = router_ip[2:-1]             

#retrieve the ip of the user
hostname = socket.gethostname()
ip_adress = socket.gethostbyname(hostname)



##############################Network scanning#################################
    
request = scapy.ARP()
request.pdst = ip_adress + '/24'
broadcast = scapy.Ether()

broadcast.dst = 'ff:ff:ff:ff:ff:ff'
    
request_broadcast = broadcast/request
    
clients = scapy.srp(request_broadcast, timeout = 0.2, verbose = 1)[0]
 
sources = []
ips = []
macs = []
for element in clients:
    name = socket.getfqdn(element[1].psrc)
    #print("        [+]" + name + "        " + element[1].psrc + "         Mac: " + element[1].hwsrc)
    
    sources.append(name)
    ips.append(element[1].psrc)
    macs.append(element[1].hwsrc)


#################################Mapping#######################################

nt = Network(height='60%', width='60%', bgcolor='#222222', font_color='white', notebook=True)    

G = nx.Graph()

router_name = socket.getfqdn(router_ip)
title = '<b>{0}</b> <br><hr>Details:<br>'.format(router_name)
info_list = '' + '<li>IPV4: ' + router_ip + '</li>'
title += '<ul>{0}</ul>'.format(info_list)
G.add_node(router_name, title=title)


i=0
for row in sources:
    i+=1
    
    if ips[i-1]==router_ip:
        continue
    
    title = '<b>{0}</b> <br><hr>Details:<br>'.format(row)
    info_list = '' + '<li>IPV4: ' + ips[i-1] + '</li>'
    info_list += '' + '<li>Mac adress: ' + macs[i-1] + '</li>'
    title += '<ul>{0}</ul>'.format(info_list)
    
    node_name = row
    if len(node_name) > 10:
        node_name = node_name[:10] + '...'
        
    G.add_node(node_name, title=title)
        
   

i=0
for row in sources:
    node_name = row
    if len(node_name) > 10:
        node_name = node_name[:10] + '...'
        
    if ips[i]!=router_ip:
        G.add_edge(router_name, node_name)
    i+=1

nt.from_nx(G)
nt.repulsion()
nt.toggle_physics(True)

nt.show("graph.html")