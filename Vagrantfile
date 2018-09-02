# -*- mode: ruby -*-
# vi: set ft=ruby :

required_plugins = ["vagrant-hostmanager", "vagrant-vbguest"]
required_plugins.each do |plugin|
    if !Vagrant.has_plugin?(plugin) then
        system "echo Not installed required plugin: #{plugin} ..."
            system "vagrant plugin install #{plugin}"
    end
end

Vagrant.configure("2") do |config|
    config.vm.box = "centos/7"

    config.ssh.insert_key = false

    config.hostmanager.enabled = true
    config.hostmanager.manage_host = true
    #config.hostmanager.manage_guest = true

    [5432, 3000].each do |port|
        config.vm.network "forwarded_port", guest: port, host: port
    end

    config.vm.define 'drug.vm' do |node|
        node.vm.hostname = 'drug.vm'
        node.hostmanager.aliases = %w(io.drug.vm admin.drug.vm api.drug.vm)
    end

   config.vm.synced_folder ".", "/var/www", mount_options: ["dmode=775", "fmode=664"]

   config.vm.provision "shell", name: 'environment.sh', path: './vagrant/environment/environment.sh'
   #config.vm.provision "shell", name: 'application.sh', path: './vagrant/environment/application.sh'
   #config.vm.provision "shell", name: 'node.sh', args: ['v10.6.0'], path: './vagrant/environment/node.sh'
   #config.vm.provision "shell", name: 'autostart.sh', path: './vagrant/environment/autostart.sh'
end
