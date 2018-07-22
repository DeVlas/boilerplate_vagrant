# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant.configure("2") do |config|
      config.vm.box = "centos/7"
      config.vm.synced_folder ".", "/home/vagrant/htdocs" , mount_options: %w(dmode=775 fmode=664)

      [5432, 3000, 3001].each do |port|
            config.vm.network "forwarded_port", guest: port, host: port
      end

    config.hostmanager.enabled = true
    config.hostmanager.manage_host = true
    config.hostmanager.manage_guest = true

    config.vm.define 'drug.vm' do |node|
        node.vm.hostname = 'drug.vm'
        node.hostmanager.aliases = %w(io.drug.vm admin.drug.vm api.drug.vm)
     end

   #config.vm.provision "shell", name: 'environment.sh', path: './vagrant/environment/environment.sh'
   #config.vm.provision "shell", name: 'application.sh', path: './vagrant/environment/application.sh'
   #config.vm.provision "shell", name: 'node.sh', args: ['v10.6.0'], path: './vagrant/environment/node.sh'
   #config.vm.provision "shell", name: 'autostart.sh', path: './vagrant/environment/autostart.sh'
end
